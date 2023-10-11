<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\VisaType;
use App\Models\VisaTypeImages;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator,File;
use Illuminate\Validation\Rule;


class VisaTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
    {
        $checkAuth = \Auth::user()->level;
        $userBrand = \Auth::user()->brand_id;
        $user = \Auth::user();

        $brands = Brand::where('id',$userBrand)->get();
        $menu_brand= DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();
        $data = [
            'brands'     => $brands,
            'menu_brand'     => $menu_brand,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_visa_type',
            'title'      => 'Visa Type'
        ];

        if ($request->ajax()) {
            $q_brand = VisaType::with('brand')->select('*')->where('brand_id',$userBrand)->orderByDesc('created_at');
            
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $valArr = [];
        if($request->id){
            $valArr['name'] = [
                'required',
                'max:200',
                Rule::unique('visa_type')
                    ->where('brand_id', $request->brand_id)
                    ->ignore($request->id)
            ];
        }else{
            $valArr['name'] = [
                'required',
                'max:200',
                Rule::unique('visa_type')
                    ->where('brand_id', $request->brand_id)
            ];
        }
        $valArr['description']   = 'nullable';
        $valArr['brand_id']      = 'required|max:20';
        if ($request->hasFile('logo')) {
            $request->validate(["logo" => "nullable|mimes:jpeg,png,jpg|max:5098"]);
        }
        $validator = Validator::make($request->all(), $valArr);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if($request->id){
            $single = VisaType::find($request->id);
        }

        $reqInt = [
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'description' => $request->description,
        ];
   
        $rec = VisaType::updateOrCreate(['id' => $request->id],$reqInt);

        if ($request->hasFile('image')) {
            $total_img = count($request->file('image'))/2;
            for($i = 0; $i < $total_img; $i++) {
                $image = $request->file('image')[$i];
                if ($image->isValid()) {
                    $name = time() . '_' . rand(0, 999999) . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path("/uploads/visatype");
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0777, true);
                    }
                    $image->move($destinationPath, $name);

                    $existingImage = VisaTypeImages::where('image', '/uploads/visatype/' . $name)->first();
            
                    if (!$existingImage) {
                  
                        $new_obj = new VisaTypeImages();
                        $new_obj->visa_type_id = $rec->id;
                        $new_obj->image = '/uploads/visatype/' . $name;
                        $new_obj->save();
                    }
                }
            }
        }

        if(isset($single) && $single){
            setActivityLog('Visa Type Updated [Visa Name: ' . $request->name . ']',json_encode($reqInt),activityEnums('visa-type'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New Visa Type Added [Visa Name: ' . $request->name . ']',json_encode($reqInt),activityEnums('visa-type'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'Visa Type saved successfully!']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $visa = VisaType::with('images')->find($id);
        if($visa){
            $imagesHtml = '';
            foreach ($visa->images as $image) {
                $imagesHtml .= '<img id="image_preview" src="' . asset($image->image) . '" width="100" height="100" class="img-fluid"/><div class="avatar-badge delete_data_button" data-id="'.$image->id.'" data-name="'.$image->image.'" title="" data-toggle="tooltip" data-original-title="Remove" style="cursor: pointer;"><i class="fas fa-trash text-danger"></i></div><br>';
            }
            $visa->image = $imagesHtml;
        }
        return response()->json($visa);

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $visaImage = VisaTypeImages::where('visa_type_id',$id)->get();

        if ($visaImage->isNotEmpty()) {
            $destinationPath = public_path("");
            foreach($visaImage as $val) {
                $image_path = $destinationPath.$val->image;
                VisaTypeImages::find($val->id)->delete();
            }
            
            if (File::exists($destinationPath)) {
                unlink($image_path);
            }
        }

        VisaType::find($id)->delete();

        return response()->json(['success'=>'Record deleted!']);
    }

    public function deleteVisaImage(Request $request)
    {
        $imageId = $request->input('id');
        $visaImage = VisaTypeImages::find($imageId);
        $destinationPath = public_path("");
        $image_path = $destinationPath.$visaImage->image;
        
        if (File::exists($destinationPath)) {
            unlink($image_path);
        }

        // Delete the image record from the database
        VisaTypeImages::findOrFail($imageId)->delete();

        return response()->json(['success'=>'Record deleted!']);
    }
}
