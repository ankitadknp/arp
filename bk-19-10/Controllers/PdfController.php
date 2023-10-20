<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\PdfDesign;
use App\Models\Brand;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator,File;
use Illuminate\Validation\Rule;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;


class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
    }

    public function pdf_list(Request $request)
    {
        $brand_name = $request->get('brand_name');
 
        $user = \Auth::user();
        $brand_ids = $user->brand_id;
        $brands = explode(",",$brand_ids);
        $brand = DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();
        $languages = Language::all();
        $data = [
            'languages'  => $languages,
            'brands'     => $brands,
            'brand'     => $brand,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_pdf',
            'title'      => 'PDF'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {
            $q_brand = PdfDesign::select('pdf.*','language.name as language_name')->where('brand_name', 'like', '%' . $brand_name . '%')->orderByDesc('created_at');

            $q_brand = $q_brand->leftJoin('language', function($join) {
                $join->on('language.id', '=', 'pdf.language_id');
            });

            
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
        $brand_name = $request->get('brand_name');
        $valArr = [];
      
        $valArr['language_id']      = 'required';
        $valArr['html']      = 'required';
       
        $validator = Validator::make($request->all(), $valArr);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $reqInt = [
            'language_id' => $request->language_id,
            'brand_name' => $brand_name,
            'html' => $request->html,
            // 'pdf' => $filename
        ];

        if($request->id){
            $single = PdfDesign::find($request->id);
            PdfDesign::where('id',$request->id)->update(['html'=>$request->html]);
        } else {
            $checkData = PdfDesign::where('language_id',$request->language_id)->where('brand_name', 'like', '%' . $brand_name . '%')->first();

            if ( !($checkData) ) {
                $rec = PdfDesign::create($reqInt);
            } else {
                return response()->json(['error' => "Data was added in same language"]);
            }
        }

        if(isset($single) && $single){
            setActivityLog('PDF Updated [Brand Name For PDF: ' . $request->brand_name . ']',json_encode($reqInt),activityEnums('visa-type'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New PDF Added [Brand Name For PDF: ' . $request->brand_name . ']',json_encode($reqInt),activityEnums('visa-type'),$rec->id,\Auth::user()->id);
        }
        return response()->json(['success'=>'PDF saved successfully!']);
       
    }

    public function edit($id)
    {
        $pdf = PdfDesign::find($id);
        if($pdf){
            $pdf->brands = Brand::all();
            $pdf->languages = Language::all();
        }
        return response()->json($pdf);

    }

    public function destroy($id)
    {
        PdfDesign::find($id)->delete();

        return response()->json(['success'=>'Record deleted!']);
    }

}
