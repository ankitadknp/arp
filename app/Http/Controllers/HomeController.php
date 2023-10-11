<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\LoginHistory;
use App\Models\Brand;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = \Auth::user();
        $checkAuth = $user->level;
        $brands  = '';
        $cnt_created_assetment = '';
        $visa_cnt = '';
        $menu_brand = '';
        $count_brand  = '';
        $representative_cnt = '';

        if ($checkAuth == 0) {
            $users = DB::table('users')->where('level',1)->count();
            $representative_cnt = DB::table('representative')->count();
            $count_brand  = DB::table('brands')->count();
        }else if ($checkAuth == 1) {
            $users = DB::table('users')->where('level','=', 1)->where('brand_id',\Auth::user()->brand_id)->count();
            $visa_cnt = DB::table('visa_type')->where('brand_id',\Auth::user()->brand_id)->count();
            $menu_brand= DB::table('brands')->select('brands.name')->where('id',\Auth::user()->brand_id)->first();
        }else{
            $users = DB::table('users')->where('level','=', 2)->where('brand_id',\Auth::user()->brand_id)->count();
            $brandIds = \Auth::user()->brand_id;
            $brandIdArray = explode(",", $brandIds);
            $brands = DB::table('brands')->whereIn('id', $brandIdArray)->pluck('name')->toArray();
            $cnt_created_assetment =  DB::table('sent_mail')->count();
        }
        $data = array(
            'brands'     =>$brands,
            'count_user' => $users,
            'visa_cnt' => $visa_cnt,
            'menu_brand' => $menu_brand,
            'count_brand' => $count_brand,
            'representative_cnt' => $representative_cnt,
            'cnt_created_assetment' => $cnt_created_assetment,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_dashboard',
        );

        return view('layouts.v_template',$data);
    }

    public function add_login_history(Request $request)
    {
        $user = \Auth::user();
        $selectedBrandLabel = $request->get('selectedBrandLabel');

        $brands = Brand::where('name', 'like', '%' . $selectedBrandLabel . '%')->first();
        $history = LoginHistory::orderByDesc('datetime')->first();

        if ($user->level == 2 ) {
            LoginHistory::where('id',$history->id)->update(['brand_id'=>$brands->id]);
        }
    }
}
