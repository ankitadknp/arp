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


class VisaTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        $checkAuth = \Auth::user()->level;
        $userBrand = \Auth::user()->brand_id;
        $user      = \Auth::user();

        $brands       = Brand::where('id',$userBrand)->get();
        $menu_brand   = DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();
        $language_id   = explode(",",$brands[0]->language_id);
        $language_data = Language::whereIn('id',$language_id)->get();

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
        $userBrand = \Auth::user()->brand_id;
        $brands       = Brand::where('id',$userBrand)->get();
        $language_id   = explode(",",$brands[0]->language_id);
        $language_data = Language::whereIn('id',$language_id)->get();

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
        $valArr['program_work']       = 'required';
        $valArr['break_down']         = 'required';
        $valArr['main_advantage']     = 'required';
        $valArr['salary_per_region']  = 'required';
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
        $fieldKeys = ['description', 'program_work', 'break_down', 'time_frame', 'salary_per_region', 'main_advantage','candidate_score','express_image','cost_image'];
        
        foreach ($language_data as $l_data) {
            $languageCode = $l_data->code;

            foreach ($fieldKeys as $fieldKey) {
                $inputFieldName = $fieldKey . '.' . $languageCode;

                if ($request->hasFile($inputFieldName)) {
                    $uploadedFile = $request->file($inputFieldName);
                    $name = time() . '_' . $uploadedFile->getClientOriginalName();
                    $destinationPath = public_path('/uploads/visa/');
                    $uploadedFile->move($destinationPath, $name);
        
                    // Now, you can save the image path in the database
                    VisaTypeDetails::updateOrCreate([
                        'visa_type_id' => $rec->id,
                        'language_id' => 1, // Assuming you use the correct language ID
                        'brand_id' => $request->brand_id,
                        'visa_key' => $fieldKey,
                    ], [
                        'value' => '/uploads/visa/' . $name, // Save the image path
                    ]);
                } else {
                    $fieldValue = $request->input($inputFieldName);
        
                    VisaTypeDetails::updateOrCreate([
                        'visa_type_id' => $rec->id,
                        'language_id' => 1, // Assuming you use the correct language ID
                        'brand_id' => $request->brand_id,
                        'visa_key' => $fieldKey,
                    ], [
                        'value' => $fieldValue, // Save text data
                    ]);
                }
            }
        }

        // $newvalue [] = [
        //     'hash_id'       => $hash_id,
        //     'field_to'      => $type,
        //     'value'         => $key_val_array[$key],
        //     'rel_column_id' => $type_id,
        //     'deleted_at'    => NULL,
        //     'field_id'      => $customFieldRec[$key],
        // ];
        // DB::table('custom_field_value')->upsert(
        //     $newvalue, 
        //     ['field_to', 'rel_column_id','field_id'], 
        //     ['value','deleted_at']
        // );
   
        if(isset($single) && $single){
            setActivityLog('Visa Type Updated [Visa Name: ' . $request->name . ']',json_encode($reqInt),activityEnums('visa-type'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New Visa Type Added [Visa Name: ' . $request->name . ']',json_encode($reqInt),activityEnums('visa-type'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'Visa Type saved successfully!']);
    }

    public function edit($id)
    {
        $userBrand = \Auth::user()->brand_id;
        $brands       = Brand::where('id',$userBrand)->get();
        $language_id   = explode(",",$brands[0]->language_id);
        $language_data = Language::whereIn('id',$language_id)->get();

        $visa = VisaType::with('details')->find($id);

        if (!$visa) {
            return response()->json(['error' => 'Visa Type not found'], 404);
        }

        $data = $visa->toArray();
        $details = $visa->details->keyBy('language_id');
    
        foreach ($language_data as $l_data) {
            foreach ($visa->details as $detail) {
                if ($detail->is_image == 1) {
                    $data[$detail->visa_key][$l_data->code] = '<img src="' . asset($detail->value) . '" width="100" height="100" class="img-fluid"/>';
                    $data[$detail->visa_key]['is_image'] = $detail->is_image;
                } 
                else {
                    $data[$detail->visa_key][$l_data->code] = $detail->value;
                    $data[$detail->visa_key]['is_image'] = $detail->is_image;
                }
            }
        }
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