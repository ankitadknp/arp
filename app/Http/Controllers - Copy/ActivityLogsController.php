<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\ActivityLogs;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;


class ActivityLogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        $data = [
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_logs',
            'title'    => 'Activity Logs'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {
            if($checkAuth == 0){
                $q_brand = ActivityLogs::select('activity_logs.id','activity_logs.datetime','activity_logs.description','activity_logs.rel_type','activity_logs.ipaddress','brands.name as brand_name','users.name as user_name');
            }else if($checkAuth == 1){
                $q_brand = ActivityLogs::select('activity_logs.id','activity_logs.datetime','activity_logs.description','activity_logs.rel_type','activity_logs.ipaddress','brands.name as brand_name','users.name as user_name')->where('brand_id',\Auth::user()->brand_id);
            }
            
            $q_brand = $q_brand->leftJoin('users', function($join) {
                $join->on('users.id', '=', 'activity_logs.added_by');
            })->leftJoin('brands', function($join) {
                $join->on('brands.id', '=', 'activity_logs.brand_id');
            })->orderByDesc('activity_logs.datetime');            
            
            return Datatables::of($q_brand)
                    ->addIndexColumn()
                    ->rawColumns([])
                    ->make(true);
        }

        
        if ($checkAuth == 0 || $checkAuth == 1) {
            return view('layouts.v_template',$data);
        }
        return view('layouts.v_not_admin');

    }

}
