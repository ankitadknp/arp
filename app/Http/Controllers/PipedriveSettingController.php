<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\PipedriveSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator,File;
use Illuminate\Validation\Rule;


class PipedriveSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function store(Request $request)
    {
        $valArr = [];

        $valArr['url']    = 'required|url';
        $valArr['token']    = 'required';
        
        $validator = Validator::make($request->all(), $valArr);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if($request->id){
            $single = PipedriveSetting::find($request->id);
        }

        $reqInt = [
            'url' => $request->url,
            'brand_id' => $request->brand_id,
            'token' => $request->token,
        ];
   
        $rec = PipedriveSetting::updateOrCreate(['id' => $request->id],$reqInt);

        if(isset($single) && $single){
            setActivityLog('Pipedrive Setting Updated [Pipedrive URL: ' . $request->url . ']',json_encode($reqInt),activityEnums('pipedeive-setting'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New Pipedrive Setting Added [Pipedrive URL: ' . $request->url . ']',json_encode($reqInt),activityEnums('pipedeive-setting'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'Pipedrive Setting saved successfully!']);
    }


    public function edit($id)
    {
        $pipe_data = PipedriveSetting::where('brand_id', $id)->first();
        return response()->json($pipe_data);

    }

}
