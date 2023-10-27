<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Brand;
use App\Models\User;
use App\Models\Representative;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Validation\Rule;


class RepresentativeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        $brands = Brand::all();
        $data = [
            'brands'     => $brands,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_representative',
            'title'    => 'Legal Representatives'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {
            $q_brand = Representative::select('*')->orderByDesc('created_at');
            
            return Datatables::of($q_brand)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($checkAuth){
     
                    $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit edit"><i class=" fi-rr-edit"></i></div>';
                    $btn = $btn.' <div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-outline-danger btn-circle mr-2 delete"><i class="fi-rr-trash"></i></div>';

                    return $btn;
                    })
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
        if($request->id){
            $single = Representative::find($request->id);
        }

        $valArr = [];
        if($request->id){
            $valArr['photo']            = 'nullable|mimes:jpg,jpeg,png,gif';
            $valArr['signature_photo']  = 'nullable|mimes:jpg,jpeg,png,gif';
            $valArr['law_logo']  = 'nullable|mimes:jpg,jpeg,png,gif';
            $valArr['email']            = 'required|max:200|email|unique:representative,email,'.$request->id.',id';
        }else{
            $valArr['photo']            = 'required|mimes:jpg,jpeg,png,gif';
            $valArr['signature_photo']  = 'required|mimes:jpg,jpeg,png,gif';
            $valArr['law_logo']         = 'required|mimes:jpg,jpeg,png,gif';
            $valArr['email']            = 'required|max:200|email|unique:representative,email|unique:users,email';
            $valArr['password']         = 'required|min:8|regex:/^(?=.*[0-9])(?=.*[A-Za-z])(?=.*[\W_]).+$/';
        }
        $valArr['name']                 = 'required|max:200';
        $valArr['bio']                  = 'required|max:2000';
        $valArr['brand_id']             = 'required';
        // $valArr['linkedin_id']       = 'required|linkedin_id';
        $valArr['linkedin_id']          = 'required';
        $valArr['license_number']       = 'required';
        $valArr['cba_number']           = 'required|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])/';

        if ($request->password != null) {
            $valArr['password']         = 'required|min:8|regex:/^(?=.*[0-9])(?=.*[A-Za-z])(?=.*[\W_]).+$/';
        }

        $customMessages = [
            // 'linkedin_id.linkedin_id' => 'The linkedin id field must be a valid id',
            'password.regex'   => 'The password must contain at least one number, one alphabet, and one special character.',
            'cba_number.regex' => 'The CBA number must contain at least one number, one alphabet',
        ];

        if(isset($single) && $single){
            if (!$single->photo ) {
                $valArr['photo']     = 'required|mimes:jpg,jpeg,png,gif';
            }

            if (!$single->signature_photo ) {
                $valArr['signature_photo']  = 'required|mimes:jpg,jpeg,png,gif';
            }

            if (!$single->law_logo ) {
                $valArr['law_logo']  = 'required|mimes:jpg,jpeg,png,gif';
            }
        }

        $validator = Validator::make($request->all(), $valArr,$customMessages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        
        $reqInt = [
            'name'           => $request->name,
            'bio'            => $request->bio,
            'brand_id'       => $request->brand_id,
            'linkedin_id'    => $request->linkedin_id,
            'license_number' => $request->license_number,
            'cba_number'     => $request->cba_number,
            'email'          => $request->email,
            'password'       => ($request->password)?Hash::make($request->password):$single->password,
        ];

        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/uploads/representative/');
            $file->move($destinationPath, $name);
            $reqInt['photo'] = '/uploads/representative/' . $name;
        }
        if($request->hasFile('signature_photo')) {
            $file = $request->file('signature_photo');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/uploads/representative_signature/');
            $file->move($destinationPath, $name);
            $reqInt['signature_photo'] = '/uploads/representative_signature/' . $name;
        }

        if($request->hasFile('law_logo')) {
            $file = $request->file('law_logo');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/uploads/law_logo/');
            $file->move($destinationPath, $name);
            $reqInt['law_logo'] = '/uploads/law_logo/' . $name;
        }
        $rec = Representative::updateOrCreate(['id' => $request->id],$reqInt);
        
        if(!$request->id){
            $userRec = User::create([
                'name'     => $request->name,
                'level'    => 2,
                'brand_id' => $request->brand_id,
                'email'    => $request->email,
                'password' =>Hash::make($request->password),
            ]); 
        } else {
            $userRec = User::where('email', $request['email'])->first();
            if ($userRec) {
                $userRec->name = $reqInt['name'];
                $userRec->email = $reqInt['email'];
                $userRec->brand_id = $reqInt['brand_id'];
                $userRec->password = ($request->password)?Hash::make($request->password):$userRec->password;
                $userRec->save();
            }
        }

        if(isset($single) && $single){
            setActivityLog('Representative Updated [Representative Name: ' . $request->name . ']',json_encode($reqInt),activityEnums('representative'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New Representative Added [Representative Name: ' . $request->name .']',json_encode($reqInt),activityEnums('representative'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'Representative saved successfully!']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Representative = Representative::find($id);

        if ($Representative->photo) {
            $Representative->photo = '<img id="image_preview" src="'.asset($Representative->photo).'" width="100" height="100"/><button type="button" id="photo_delete" class="btn btn-danger btn-sm  photo_delete" data-id="'.$id.'" ><i class="fas fa-trash"></i></button>';
        }

        if ($Representative->signature_photo) {
            $Representative->signature_photo = '<img id="signature_preview" src="'.asset($Representative->signature_photo).'" width="100" height="100"/><button type="button" id="signature_delete" class="btn btn-danger btn-sm signature_delete" data-id="'.$id.'" ><i class="fas fa-trash"></i></button>';
        }

        if ($Representative->law_logo) {
            $Representative->law_logo = '<img id="logo_preview" src="'.asset($Representative->law_logo).'" width="100" height="100"/><button type="button" id="logo_delete" class="btn btn-danger btn-sm logo_delete" data-id="'.$id.'" ><i class="fas fa-trash"></i></button>';
        }
        return response()->json($Representative);

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $rec = Representative::find($id);
        User::where('email', $rec ->email)->where('level', 2)->delete();
        $rec->delete();

        return response()->json(['success'=>'Record deleted!']);
    }

    public function signature_delete(Request $request) 
    {
        $id = $request->get('id');
        Representative::where('id',$id)->update(['signature_photo'=>'']);
        return response()->json(['success'=>'Signature photo was deleted successfully!']);
    }

    public function photo_delete(Request $request) 
    {
        $id = $request->get('id');
        Representative::where('id',$id)->update(['photo'=>'']);
        return response()->json(['success'=>'Photo was deleted successfully!']);
    }

    public function law_logo_delete(Request $request) 
    {
        $id = $request->get('id');
        Representative::where('id',$id)->update(['law_logo'=>'']);
        return response()->json(['success'=>'Law logo was deleted successfully!']);
    }
}
