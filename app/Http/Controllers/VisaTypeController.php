<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\VisaType;
use App\Models\VisaTypeImages;
use App\Models\VisaTypeDetails;
use App\Models\Language;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator,File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;


class VisaTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function getLanguageCode()
    {
        $userBrand = \Auth::user()->brand_id;
        $brands       = Brand::where('id',$userBrand)->get();
        $language_id   = explode(",",$brands[0]->language_id);
        $language_data = Language::where(function ($query) use ($language_id) {
            foreach ($language_id as $id) {
                $query->orWhere('code', 'like', '%' . $id . '%');
            }
        })->get();

        return $language_data;
    }

    public function index(Request $request)
    {
        $checkAuth = \Auth::user()->level;
        $user      = \Auth::user();
        $userBrand = \Auth::user()->brand_id;
        $brands       = Brand::where('id',$userBrand)->get();

        $menu_brand   = DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();
        $language_data = $this->getLanguageCode();

        $data = [
            'language_data' => $language_data,
            'brands'        => $brands,
            'menu_brand'    => $menu_brand,
            'menu'          => 'menu.v_menu_admin',
            'content'       => 'content.view_visa_type',
            'title'         => 'Visa Type'
        ];

        if ($request->ajax()) {
            $q_brand = VisaType::with('brand')->select('*')->where('brand_id',$userBrand)->orderByDesc('created_at');
            
            return Datatables::of($q_brand)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($checkAuth){
     
                        $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit edit"><i class=" fi-rr-edit"></i></div>';
                        $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 delete"><i class="fi-rr-trash"></i></div>';
 
                        return $btn;
                    })
                    ->make(true);
        }

        if ($checkAuth == 1) {
            return view('layouts.v_template',$data);
        }
        return view('layouts.v_not_admin');

    }

    public function store(Request $request)
    {
        $language_data = $this->getLanguageCode();

        $valArr = [];
        if($request->id){
            $valArr['name'] = [
                'required',
                'max:200',
                Rule::unique('visa_type')
                    ->where('brand_id', $request->brand_id)
                    ->ignore($request->id)
            ];
        }else{
            $valArr['name'] = [
                'required',
                'max:200',
                Rule::unique('visa_type')
                    ->where('brand_id', $request->brand_id)
            ];
        }
        $valArr['description']        = 'required';
        // $valArr['program_work']       = 'required';
        // $valArr['break_down']         = 'required';
        $valArr['main_advantage']     = 'required';
        // $valArr['salary_per_region']  = 'required';
        $valArr['time_frame']         = 'required';
        $valArr['brand_id']           = 'required|max:20';
        // $valArr['cost_image']         = 'required';
        // $valArr['express_image']      = 'required';
        // $valArr['candidate_score']    = 'required';

        $validator = Validator::make($request->all(), $valArr);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if($request->id){
            $single = VisaType::find($request->id);
        }

        $reqInt = [
            'name'     => $request->name,
            'brand_id' => $request->brand_id,
        ];

        $rec = VisaType::updateOrCreate(['id' => $request->id],$reqInt);
        $fieldKeys = ['description', 'program_work','candidate_score', 'break_down', 'time_frame', 'salary_per_region', 'main_advantage','express_image','cost_image'];

        foreach ($language_data as $l_data) {
            $languageCode = $l_data->code;
        
            foreach ($fieldKeys as $fieldKey) {
                $inputFieldName = $fieldKey . '.' . $languageCode;
                $fieldValue = null; // Initialize field value as null
        
                if ($request->hasFile($inputFieldName)) {
                    $uploadedFile    = $request->file($inputFieldName);
                    $name            = time() . '_' . $uploadedFile->getClientOriginalName();
                    $destinationPath = public_path('/uploads/visa/');
                    $uploadedFile->move($destinationPath, $name);
                    $fieldValue      = $name; // Set field value for image
                    $is_image        = 1 ;
                } elseif ($request->filled($inputFieldName)) {
                    $fieldValue     = $request->input($inputFieldName); // Set field value for text data
                    $is_image       = 0 ;
                }
        
                // Use upsert to add or edit records
                if ($fieldValue != null) {
                    VisaTypeDetails::updateOrCreate(
                        [
                            'visa_type_id' => $rec->id,
                            'language_code' => $languageCode, // Assuming you use the correct language ID
                            'brand_id'    => $request->brand_id,
                            'visa_key'    => $fieldKey,
                            'is_image'    => $is_image
                        ],
                        ['value'          => $fieldValue,
                        ]
                    );
                }
            }
        }
        
        if(isset($single) && $single){
            setActivityLog('Visa Type Updated [Visa Name: ' . $request->name . ']',json_encode($reqInt),activityEnums('visa-type'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New Visa Type Added [Visa Name: ' . $request->name . ']',json_encode($reqInt),activityEnums('visa-type'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'Visa Type saved successfully!']);
    }

    public function edit($id)
    {
        $language_data = $this->getLanguageCode();

        $visa = VisaType::with('details')->find($id);

        if (!$visa) {
            return response()->json(['error' => 'Visa Type not found'], 404);
        }

        $data = $visa->toArray();
        $details = $visa->details->keyBy('language_id');

        // foreach ($language_data as $l_data) {
            foreach ($visa->details as $detail) {
                // $data[$detail->visa_key][$l_data->code] = $detail->is_image == 1
                //     ? '<img src="' . asset($detail->value) . '" width="100" height="100" class="img-fluid"/>'
                //     : $detail->value;
                $data[$detail->visa_key][$detail->language_code] = $detail->value;
                $data[$detail->visa_key]['is_image'] = $detail->is_image;
            }
        // }
    
        return response()->json($data);
    }

    public function destroy($id)
    {
        $visaImage = VisaTypeImages::where('visa_type_id',$id)->get();

        if ($visaImage->isNotEmpty()) {
            $destinationPath = public_path("");
            foreach($visaImage as $val) {
                $image_path = $destinationPath.$val->image;
                VisaTypeImages::find($val->id)->delete();
            }
            
            if (File::exists($destinationPath)) {
                unlink($image_path);
            }
        }

        VisaType::find($id)->delete();

        return response()->json(['success'=>'Record deleted!']);
    }

    public function deleteVisaImage(Request $request)
    {
        $imageId = $request->input('id');
        $visaImage = VisaTypeImages::find($imageId);
        $destinationPath = public_path("");
        $image_path = $destinationPath.$visaImage->image;
        
        if (File::exists($destinationPath)) {
            unlink($image_path);
        }

        // Delete the image record from the database
        VisaTypeImages::findOrFail($imageId)->delete();

        return response()->json(['success'=>'Record deleted!']);
    }


}
