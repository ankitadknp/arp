<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\SmtpSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;


class SmtpSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {

        $user = \Auth::user();
        $brand_ids = $user->brand_id;
        $brands = explode(",",$brand_ids);
        $brand = DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();

        $smtp = SmtpSetting::first();
        if (!$smtp) {
            $smtp_id = '';
        } else {
            $smtp_id = $smtp->id;
        }
        $data = [
            'smtp_id' => $smtp_id,
            'brands'     => $brands,
            'brand'     => $brand,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_smtp_setting',
            'title'    => 'Smtp Setting'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {
            $q_brand = SmtpSetting::select('*')->orderByDesc('created_at');
            
            return Datatables::of($q_brand)
                ->addIndexColumn()
                ->addColumn('action', function($row) use($checkAuth){
    
                    // $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit edit"><i class=" fi-rr-edit"></i></div>';
                    // $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 delete"><i class="fi-rr-trash"></i></div>';

                    // return $btn;
                })
                
                ->rawColumns(['action','logo'])
                ->make(true);
        }

        
        if ($checkAuth == 2) {
            return view('layouts.v_template',$data);
        }
        return view('layouts.v_not_representative');

    }

    public function store(Request $request)
    {
        $user = \Auth::user();

        $valArr = [];
        if($request->id){
        }
        else{
            $valArr['password']    = 'required|min:8';
        }
        $valArr['host']    = 'required|valid_host';
        $valArr['port']    = 'required|numeric';
        $valArr['username']    = 'required';
        $valArr['encryption']    = 'required|in:tls,ssl';
        $valArr['from_email_address']    = 'required';
        $valArr['from_name']    = 'required';

        $customMessages = [
            'host.valid_host' => 'The host field must be a valid domain or hostname(e.g., smtp.gmail.com)',
            // 'password.regex' => 'The password must contain at least one number, one alphabet, and one special character.',
        ];

        $validator = Validator::make($request->all(), $valArr,$customMessages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if($request->id){
            $single = SmtpSetting::find($request->id);
        }

        $reqInt = [
            'brand_id' => $request->brand_id,
            'from_name' => $request->from_name,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            // 'password' => ($request->password)?Hash::make($request->password):$single->password,
            'password' => ($request->password) ? $request->password:$single->password,
            'encryption' => $request->encryption,
            'from_email_address' => $request->from_email_address,
            'from_name' => $request->from_name,
        ];
      
        $rec = SmtpSetting::updateOrCreate(['id' => $request->id],$reqInt);

        if(isset($single) && $single){
            setActivityLog('Smtp Setting Updated [SMTP UserName: ' . $request->username  . ']',json_encode($reqInt),activityEnums('smtp-setting'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New Smtp Setting Added [SMTP UserName: ' . $request->username  . ']',json_encode($reqInt),activityEnums('smtp-setting'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'Smtp Setting saved successfully!']);
    }
    public function edit($id)
    {
        $SmtpSetting = SmtpSetting::where('brand_id', $id)->first();
        return response()->json($SmtpSetting);
    }

}
