<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\LoginHistory;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;


class LoginHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        $data = [
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_login_history',
            'title'    => 'Login History'
        ];

        $checkAuth = \Auth::user()->level;
        
        if ($request->ajax()) {
            if($checkAuth == 0){
                $q_brand = LoginHistory::select('users.name as user_name','login_history.datetime','brands.name as brand_name','login_history.user_type');
            }else if($checkAuth == 1){
                $q_brand = LoginHistory::select('users.name as user_name','login_history.datetime','brands.name as brand_name','login_history.user_type','users.brand_id')->where('users.brand_id',\Auth::user()->brand_id);
            }
            
            $q_brand = $q_brand->leftJoin('users', function($join) {
                $join->on('users.id', '=', 'login_history.user_id');
            })->leftJoin('brands', function($join) {
                $join->on('brands.id', '=', 'login_history.brand_id');
            })->orderByDesc('login_history.datetime');      
            
            
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
