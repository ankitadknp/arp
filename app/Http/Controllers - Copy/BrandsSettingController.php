<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Language;
use App\Models\Brand;
use App\Models\User;
use App\Models\PipedriveSetting;
use App\Models\VisaType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;


class BrandsSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        $user = \Auth::user();
        $languages = Language::all();
        $menu_brand = DB::table('brands')->where('id',$user->brand_id)->first();

        if (!$menu_brand) {
            $brand_setting_id = '';
        } else {
            $brand_setting_id = $menu_brand->id;
        }

        $data = [
            'languages'        => $languages,
            'menu_brand'       => $menu_brand,
            'brand_setting_id' => $brand_setting_id,
            'menu'             => 'menu.v_menu_admin',
            'content'          => 'content.view_brand_setting',
            'title'            => 'Brand Setting'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {
            $q_brand = Brand::select('*')->where('name', 'like', '%' . $menu_brand->name . '%')->orderByDesc('created_at');
            
            return Datatables::of($q_brand)
                ->addIndexColumn()
                ->addColumn('action', function($row) use($checkAuth){
                })
                ->addColumn('logo', function($row) use($checkAuth){
                    if ($row->logo) {
                        return '<img src="'.asset($row->logo).'" width="100" height="100"/>';
                    } 
                })
                ->rawColumns(['action','logo'])
                ->make(true);
        }

        
        if ($checkAuth == 1) {
            return view('layouts.v_template',$data);
        }
        return view('layouts.v_not_admin');

    }

    public function store(Request $request)
    {
        $valArr = [];
        if($request->id){
            $valArr['name']    = 'required|max:200|unique:brands,name,'.$request->id.',id';
            $valArr['logo']    = 'nullable|mimes:jpg,jpeg,png,gif|max:2048';
        }else{
            $valArr['name']    = 'required|max:200|unique:brands,name';
            $valArr['logo']    = 'required|mimes:jpg,jpeg,png,gif|max:2048';
        }
        $valArr['email']    = 'required|max:200';
        $valArr['language_id']    = 'required';
        $valArr['website']    = 'required|url';
        $valArr['phone_no']    = 'required|string|min:7|max:12';
        
        $validator = Validator::make($request->all(), $valArr);

        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if($request->id){
            $single = Brand::find($request->id);
        }

        $reqInt = [
            'name' => $request->name,
            'about_en' => ($request->about_en) ? $request->about_en : '',
            'email' => $request->email,
            'language_id' => $request->language_id,
            'about_fr' => ($request->about_fr) ? $request->about_fr : '',
            'website' => $request->website,
            'phone_no' => $request->phone_no,
        ];
        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = time().'_'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/', $name);
            $reqInt['logo'] = '/uploads/'. $name;
        }
        $rec = Brand::updateOrCreate(['id' => $request->id],$reqInt);

        if(isset($single) && $single){
            setActivityLog('Brand Updated [ID: ' . $request->id . ', ' . $request->email  . ' -> '.$request->name . ']',json_encode($reqInt),activityEnums('brand'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New Brand Added [ID: ' . $rec->id . ', ' . $request->email  . ' -> '.$request->name . ']',json_encode($reqInt),activityEnums('brand'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'Brand saved successfully!']);
    }

    public function edit($id)
    {
        $Brand = Brand::find($id);
        
        if($Brand->logo){
            $Brand->logo = '<img id="image_preview" src="'.asset($Brand->logo).'" width="100" height="100"/><button type="button" id="deleteImage" class="btn btn-danger btn-sm brand_delete" data-id="'.$id.'" ><i class="fas fa-trash"></i></button>';
            $Brand->languages = Language::all();
        }
        return response()->json($Brand);

    }
}
