<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\CreatedDateAssement;
use App\Models\SmtpSetting;
use App\Models\VisaType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator,File,Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;


class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        $user = \Auth::user();

        $menu_brand= DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();

        $visatypes = VisaType::all();
        $data = [
            'visatypes'  => $visatypes,
            'menu_brand'     => $menu_brand,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_report',
            'title'      => 'Report'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {
            $q_brand = CreatedDateAssement::select('*')->where('is_sent_mail',1)->orderByDesc('created_at');

            
            return Datatables::of($q_brand)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($checkAuth){
                        $btn = '<a href="' . $row->pdf_file . '" target="_blank" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2"><i class="fas fa-download"></i></a>';

                    return $btn;

                    })
                    ->make(true);
        }

        if ($checkAuth == 1) {
            return view('layouts.v_template',$data);
        }
        return view('layouts.v_not_admin');

    }

}
