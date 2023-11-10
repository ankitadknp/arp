<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\VisaType;
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
        // dd($request->all());
        
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
        $valArr['brand_id']           = 'required|max:20';

        $validator = Validator::make($request->all(), $valArr);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if($request->id){
            $single = VisaType::find($request->id);
            $visa_details = VisaTypeDetails::where('visa_type_id',$request->id)->pluck('visa_key');
        }

        $reqInt = [
            'name'     => $request->name,
            'brand_id' => $request->brand_id,
        ];

        $rec = VisaType::updateOrCreate(['id' => $request->id],$reqInt);
        $visa_title = [] ;

        if ($request->id == 1) {
            $visa_title = setAtlanticVisaTitle();
        }

        if ($request->id == 2) {
            $visa_title = setAlbertaVisaTitle();
        }

        if ($request->id == 3) {
            $visa_title = setBritishVisaTitle();
        }

        if ($request->id == 4) {
            $visa_title = setWorkPermitVisaTitle();
        }

        if ($request->id == 5) {
            $visa_title = setexpressVisaTitle();
        }

       

        if ($visa_title) {

            foreach ($language_data as $l_data) {
                $languageCode = $l_data->code;
                // $visaRes = VisaTypeDetails::where('visa_type_id',$rec->id)->where('language_code', $languageCode)->where('brand_id',$request->brand_id)->get();

                // if ($visaRes) {
                //     VisaTypeDetails::where('visa_type_id',$rec->id)->where('language_code', $languageCode)->where('brand_id',$request->brand_id)->delete();
                // }
            
                foreach ($visa_title as $v_key=>$fieldKey) {
                    $currunt_var = $request->input($fieldKey['id']);
                    $image_id = $fieldKey['id'];
                    $fieldValue = null;
                    $visa_key = $fieldKey['key'];
                    $rules = [];

                    if ( $fieldKey['is_image'] == 1) {
                        $valuesArray = $visa_details->toArray();
                            
                        if (in_array($visa_key, $valuesArray)) {
                            $rules[$image_id] = 'nullable';
                        } else {
                            $rules[$image_id] = 'required';
                        }

                        $validator = Validator::make($request->all(), $rules);

                        if ($validator->fails()) {
                            return response()->json(['error' => $validator->errors()->all()]);
                        }

                        if ($request->hasFile($image_id)) {
                            $uploadedFiles   = $request->file($currunt_var);
                            foreach ($uploadedFiles as $key=>$val) {
                                if($key == $image_id) {
                                    if (isset($val[$languageCode])) {
                                        $file     = $val[$languageCode];
                                        $name            = time() . '_' . $file->getClientOriginalName();
                                        $destinationPath = public_path('/uploads/visa/');
                                        $file->move($destinationPath, $name);
                                        $fieldValue      ='/uploads/visa/'. $name; // Set field value for image
                                        $is_image        = 1 ;
                                    }
                                }
                            }
                        } 
                    } else {
                        $fieldValue    = $currunt_var[$languageCode];
                        $is_image      = 0 ;
                    }

                    if ( ($currunt_var !== null && isset($currunt_var[$languageCode])) || ($request->hasFile($image_id) && $fieldValue !== null) ) {

                        VisaTypeDetails::updateOrCreate(
                            [
                                'visa_type_id'  => $rec->id,
                                'language_code' => $languageCode, // Assuming you use the correct language ID
                                'brand_id'      => $request->brand_id,
                                'visa_key'      => $fieldKey['key'],
                                'is_image'      => $is_image
                            ],
                            [ 'value'           => $fieldValue,
                            ]
                        );
                    }
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
            return response()->json(['error' => 'Visa not found'], 404);
        }

        $visa_title = [];
        if ($id == 1) {
            $visa_title = setAtlanticVisaTitle();
        }

        if ($id == 2) {
            $visa_title = setAlbertaVisaTitle();
        }

        if ($id == 3) {
            $visa_title = setBritishVisaTitle();
        }

        if ($id == 4) {
            $visa_title = setWorkPermitVisaTitle();
        }

        if ($id == 5) {
            $visa_title = setexpressVisaTitle();
        }

        $data    = $visa->toArray();
        $details = $visa->details->keyBy('language_code');

        foreach ($visa->details as $detail) {
            $data[$detail->visa_key][$detail->language_code] = $detail->value;
            $data[$detail->visa_key]['is_image'] = $detail->is_image;
        }
    
        // return response()->json($data);
        return response()->json([
            'data' => $data,
            'title' => $visa_title,
        ]);
    }

    public function destroy($id)
    {
        $visaDetails = VisaTypeDetails::where('visa_type_id',$id)->get();

        if ($visaDetails->isNotEmpty()) {
            $destinationPath = public_path("");
            foreach($visaDetails as $val) {
                if ($val->is_image == 1) {
                    $image_path = $destinationPath.$val->value;
                    if (File::exists($destinationPath)) {
                        unlink($image_path);
                    }
                }
                VisaTypeDetails::find($val->id)->delete();
            }
        }

        VisaType::find($id)->delete();

        return response()->json(['success'=>'Record deleted!']);
    }


}
