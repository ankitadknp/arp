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


class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        $languages = Language::all();
        $data = [
            'languages'  => $languages,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_brand',
            'title'    => 'Brands'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {
            $q_brand = Brand::select('*')->orderByDesc('created_at');
            
            return Datatables::of($q_brand)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($checkAuth){
     
                        $btn = '<div class="btn-group" role="group" aria-label="Action buttons">';
                        $btn .= '<div data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit border-circle-right"><i class="fi-rr-edit"></i></div>';
                        $btn .= '<div data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 delete border-circle-right"><i class="fi-rr-trash"></i></div>';
                        $btn .= '<div data-toggle="tooltip" title="pipedrive_setting" data-id="'.$row->id.'" data-original-title="pipedrive_setting" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 setting border-circle-right"><i class="fas fa-cog"></i></div>';
                        $btn .= '<div data-toggle="tooltip" title="smtp_setting" data-id="'.$row->id.'" data-original-title="smtp_setting" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 smtp_setting border-circle-right"><i class="fas fa-cog"></i></div>';
                        $btn .= '</div>';
 
                        return $btn;
                    })
                    ->addColumn('logo', function($row) use($checkAuth){
                        if ($row->logo) {
                            return '<img src="'.asset($row->logo).'" width="100" height="100"/>';
                        }
                    })
                    ->rawColumns(['action','logo'])
                    ->make(true);
        }

        
        if ($checkAuth == 0) {
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
        $valArr['phone_no']    = 'required|string|min:7';
        $valArr['language_id']    = 'required';
        // $valArr['website']    = 'required|url';
        $valArr['website']    = 'required';
        
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
            'phone_no' => $request->phone_no,
            'language_id' => $request->language_id,
            'about_fr' => ($request->about_fr) ? $request->about_fr : '',
            'website' => $request->website,
        ];
        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = time().'_'.$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/', $name);
            $reqInt['logo'] = '/uploads/'. $name;
        }
        $rec = Brand::updateOrCreate(['id' => $request->id],$reqInt);

        if(isset($single) && $single){
            setActivityLog('Brand Updated [Brand Name: ' . $request->name. ', ' . $request->email  . ']',json_encode($reqInt),activityEnums('brand'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New Brand Added [Brand Name: ' . $request->name . ', ' . $request->email  . ' ]',json_encode($reqInt),activityEnums('brand'),$rec->id,\Auth::user()->id);
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

    public function destroy($id)
    {
        if (User::whereRaw("FIND_IN_SET($id, brand_id)")->exists()) {
            return response()->json(['error' => "Record related with user so, you can't delete it."]);
        } 
        if (VisaType::whereRaw("FIND_IN_SET($id, brand_id)")->exists()) {
            return response()->json(['error' => "Record related with visa type so, you can't delete it."]);
        } 

        Brand::find($id)->delete();

        return response()->json(['success'=>'Record deleted!']);
    }

    public function brand_delete(Request $request) 
    {
        $id = $request->get('id');
        Brand::where('id',$id)->update(['logo'=>'']);
        return response()->json(['success'=>'Brand logo was deleted successfully!']);
    }
}
