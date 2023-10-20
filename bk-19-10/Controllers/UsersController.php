<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {

        $brands = Brand::all();
        $user = \Auth::user();
        $menu_brand= DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();
        $checkAuth = \Auth::user()->level;

        $data = [
            'brands'  => $brands,
            'checkAuth'  => $checkAuth,
            'menu_brand'  => $menu_brand,
            'menu'    => 'menu.v_menu_admin',
            'content' => 'content.view_user',
            'title'   => 'Users'
        ];

        if ($request->ajax()) {
            $q_user = User::select('*');
            if ($checkAuth == 0) {
                // $q_user = $q_user->whereIn('level',[1,0])->orderByDesc('created_at');
                $q_user = $q_user->where('level',1)->orderByDesc('created_at');
            }else{
                $q_user = $q_user->where('level','=', 1)->where('brand_id','=', \Auth::user()->brand_id)->orderByDesc('created_at');
            }
            return Datatables::of($q_user)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($checkAuth){
     
                    $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit editUser"><i class=" fi-rr-edit"></i></div>';

                    
                    $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 deleteUser"><i class="fi-rr-trash"></i></div>';

                    return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        
        if ($checkAuth == 0 || $checkAuth == 1) {
            return view('layouts.v_template',$data);
        }
        return view('layouts.v_not_admin');

    }

    public function store(Request $request)
    {
        $checkAuth = \Auth::user()->level;
        $valArr = [
            'name'     => 'required|max:200'
        ];
        if($request->user_id){
            $valArr['email']    = 'required|max:200|email|unique:users,email,'.$request->user_id.',id';
        }else{
            $valArr['email']    = 'required|max:200|email|unique:users,email';
            $valArr['password'] = 'required|min:8|regex:/^(?=.*[0-9])(?=.*[A-Za-z])(?=.*[\W_]).+$/';
        }

        if ($request->password != null) {
            $valArr['password']  = 'required|min:8|regex:/^(?=.*[0-9])(?=.*[A-Za-z])(?=.*[\W_]).+$/';
        }

        $customMessages = [
            'password.regex' => 'The password must contain at least one number, one alphabet, and one special character.',
        ];
        
        if($request->user_id){
            $User = User::find($request->user_id);
        }

        if((isset($User) && $User->level == 1 && $checkAuth == 0) || $checkAuth == 0){
            $valArr['brand'] = 'required';
        }
        $validator = Validator::make($request->all(), $valArr,$customMessages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $authuserbrandid = (\Auth::user()->brand_id)?\Auth::user()->brand_id:0;
        $brand_id = ($request->brand)?$request->brand:$authuserbrandid;
        $level = 1;

        if(isset($User) && $User->level == 0 && $checkAuth == 0){
            $brand_id = 0;
            $level = 0;
        }else if(isset($User) && $User->level == 1 && $checkAuth == 0){
            $brand_id = $request->brand;
            $level = 1;
        }else if(isset($User) && $User->level == 1 && $checkAuth == 1){
            $brand_id = $authuserbrandid;
            $level = 1;
        }

     
        $rec = User::updateOrCreate(['id' => $request->user_id],
                [
                 'name' => $request->name,
                 'email' => $request->email,
                 'level' => $level,//$request->level, 0 = super admin , 1 = user
                 'brand_id' => $brand_id,
                 'password' => ($request->password)?Hash::make($request->password):$User->password,
                ]);        

        if(isset($User) && $User){
            setActivityLog('User Updated [User Name: ' . $request->name . ', ' . $request->email  . ']',json_encode($request->all()),activityEnums('user'),$request->user_id,\Auth::user()->id);
        }else{
            setActivityLog('New User Added [User Name: ' . $request->name . ', ' . $request->email  . ']',json_encode($request->all()),activityEnums('user'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'User saved successfully!']);
    }

    public function edit($id)
    {
        $checkAuth = \Auth::user()->level;
        $User = User::find($id);
        if($User->level == 0){
            $checkAuth = 1;
        }
        return response()->json(['user'=>$User,'checkAuth'=>$checkAuth]);

    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success'=>'Record deleted!']);
    }
}
