<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Language;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;


class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        $languages = setLanguage();
        // dd($languages);
        $data = [
            'languages'  => $languages,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_language',
            'title'      => 'Languages'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {
            $q_brand = Language::select('*')->orderByDesc('created_at');
            
            return Datatables::of($q_brand)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($checkAuth){
     
                        $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit edit"><i class=" fi-rr-edit"></i></div>';
                        $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 delete"><i class="fi-rr-trash"></i></div>';
 
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        if ($checkAuth == 0) {
            return view('layouts.v_template',$data);
        }
        return view('layouts.v_not_admin');
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $valArr = [];
        if($request->id){
            $valArr['code']    = 'required|max:20|unique:language,code,'.$request->id.',id';
        }else{
            $valArr['code']    = 'required|max:20|unique:language,code';
        }
        $valArr['orientation']    = 'required|max:20';
        $validator = Validator::make($request->all(), $valArr);

        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if($request->id){
            $single = Language::find($request->id);
        }


        $languages = setLanguage();
        foreach($languages as $language) {
            if($language['code'] == $request->code) {
                $name = $language['name'];
            }
        }
        $reqInt = [
            'name' => $name,
            'code' => $request->code,
            'orientation' => $request->orientation,
        ];
   
        $rec = Language::updateOrCreate(['id' => $request->id],$reqInt);

        if(isset($single) && $single){
            setActivityLog('Language Updated [Language Name:' . $name  . ']',json_encode($reqInt),activityEnums('language'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New Language Added [Language Name:'.$name . ']',json_encode($reqInt),activityEnums('language'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'Language saved successfully!']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Language = Language::find($id);
        
        return response()->json($Language);

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        if (Brand::whereRaw("FIND_IN_SET($id, language_id)")->exists()) {
            return response()->json(['error' => "Record related with brand so, you can't delete it."]);
        } 

        Language::find($id)->delete();

        return response()->json(['success'=>'Record deleted!']);

    }
}
