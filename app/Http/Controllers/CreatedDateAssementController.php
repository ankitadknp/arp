<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\CreatedDateAssement;
use App\Models\SmtpSetting;
use App\Models\VisaType;
use App\Models\PipedriveSetting;
use App\Models\Representative;
use App\Models\Brand;
use App\Models\VisaTypeDetails;
use App\Models\Language;
use App\Models\CreateAssetmentImages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator,File,Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use Illuminate\Support\Facades\View;


class CreatedDateAssementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request) {}

    public function search_list(Request $request)
    {
        $search_email = $request->get('search_email_filters');
        $visatypes  = VisaType::all();
        $languages = Language::all();
        $user = \Auth::user();
        $brand_ids = $user->brand_id;
        $brands = explode(",",$brand_ids);
        $brand = DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();

        $data = [
            'visatypes'  => $visatypes,
            'languages'  => $languages,
            'brands'     => $brands,
            'brand'     => $brand,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_created_date_assement',
            'title'      => 'Create Assement PDF'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {

            $q_brand = CreatedDateAssement::select('*')->where('email', 'like', '%' . $search_email . '%')->orderByDesc('created_at');

            return Datatables::of($q_brand)
                ->addIndexColumn()
                ->addColumn('action', function($row) use($checkAuth){
                $btn = '';
                    if ($row->is_sent_mail == 0) {
                        $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Sent Mail" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2  sent_mail"><i class="fas fa-envelope"></i></div>';
                        $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit edit"><i class=" fi-rr-edit"></i></div>';
                    }
                    if ($row->is_sent_mail == 1) {
                        $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Sent Mail" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2  sent_mail"><i class="fas fa-reply"></i></div>';
                        $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="view" title="View" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 view"><i class=" fi-rr-eye"></i></div>';
                    }
                    return $btn;
                })
                ->make(true);
         
        }

        if ($checkAuth == 2) {
            return view('layouts.v_template',$data);
        }
        return view('layouts.v_not_representative');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user_id = \Auth::user()->id;
        $valArr = [];

        if($request->id){
            $valArr['email']    = 'required|max:200|email|unique:sent_mail,email,'.$request->id.',id';
        } else {
            $valArr['email']   = 'required|email|unique:sent_mail,email';
        }

        $valArr['name']                   = 'required';
        $valArr['visa_type_id']           = 'required|min:2';
        $valArr['recommended_visa_type']  = 'required';
        $valArr['credit_score']           = 'required|integer|between:200,600';
        $valArr['noc']                    = 'required';
        $valArr['teer_category']          = 'required';
        $valArr['age']                    = 'required|integer';
        $valArr['country']                = 'required';
        $valArr['education_level']        = 'required';  
        $valArr['occupation']             = 'required';
        $valArr['case_number']             = 'required';
        $valArr['phone_no']               = 'required|string|min:7';
        $valArr['language_code']          = 'required';
     
       
        $validator = Validator::make($request->all(), $valArr);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if($request->id){
            $single = CreatedDateAssement::find($request->id);
        }

        $reqInt = [
            'visa_type_id'           => $request->visa_type_id,
            'recommended_visa_type'  => $request->recommended_visa_type,
            'email'                  => $request->email,
            'representative_id'      => $user_id,
            'name'                   => $request->name,
            'credit_score'           => $request->credit_score,
            'teer_category'          => $request->teer_category,
            'noc'                    => $request->noc,
            'country'                => ($request->country) ? $request->country:'',
            'occupation'             => ($request->occupation) ? $request->occupation :'',
            'education_level'        => ($request->education_level) ? $request->education_level : '',
            'age'                    => ($request->age ) ? $request->age : '',
            'case_number'             => ($request->case_number) ? $request->case_number : '',
            'is_sent_mail'           => 0,
            'phone_no'               => $request->phone_no,
            'city'                   => $request->city,
            'language_code'          => $request->language_code,
            'conclusion'             => '-',
        ];
   
        $rec = CreatedDateAssement::updateOrCreate(['id' => $request->id],$reqInt);

        //store images
        foreach ($request->all() as $fieldName => $fieldValue) {
            if (is_array($fieldValue)) {
                if (str_contains($fieldName, '_salary')) {
                    $fieldNameWithoutNumber = preg_replace('/\d+/', '', $fieldName);
                    preg_match('/(\d+)/', $fieldName, $matches);

                    if (!empty($matches)) {
                        $visa_type_id = $matches[0];
                    }
                    $imagesRes = CreateAssetmentImages::where('visa_type_id',$visa_type_id)->get();
                    if ($imagesRes) {
                        CreateAssetmentImages::where('visa_type_id',$visa_type_id)->delete();
                    }

                    foreach ($fieldValue as $v_key=>$file) {
                        $name            = time() . '_' . $file->getClientOriginalName();
                        $destinationPath = public_path('/uploads/create_assetment/');
                        $file->move($destinationPath, $name);
                        $fieldValue      ='/uploads/create_assetment/'. $name;
                        $key = $fieldNameWithoutNumber . '_' . $v_key;

                        CreateAssetmentImages::updateOrCreate(
                            [
                                'create_assetment_id' => $rec->id,
                                'visa_type_id'  => $visa_type_id,
                                'key'           => $key,
                            ],
                            [ 'value'           => $fieldValue,
                            ]
                        );
                    }
                }
            }
        }


        if(isset($single) && $single){
            setActivityLog('PDF Updated [Name: ' . $request->name . ', ' . $request->email  . ']',json_encode($reqInt),activityEnums('visa-type'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New PDF Added [Name: ' . $request->name . ', ' . $request->email  . ']',json_encode($reqInt),activityEnums('visa-type'),$rec->id,\Auth::user()->id);
        }

        return response()->json(['success'=>'PDF saved successfully!']);
    }

    public function edit($id)
    {
        $data = CreatedDateAssement::find($id);
        $image_data = CreateAssetmentImages::where('create_assetment_id',$id)->get();
        if ($data) {
            $data->image_data = $image_data;
        }
        return response()->json($data);

    }

    public function search_email(Request $request) 
    {
        $email = $request->get('email');
        $brand_name = $request->get('brand_name');

        if (empty($email)) {
            return response()->json(['error' => "Email is required"]);
        }

        $checkEmail = CreatedDateAssement::where('email', 'like', '%' . $email . '%')->first();

        if ($checkEmail) {
            return response()->json(['error' => "The mail has already been sent via other legal representative"]);
        }

        $brands = Brand::where('name', 'like', '%' . $brand_name . '%')->first();

        $pipe_setting = PipedriveSetting::where('brand_id', $brands->id)->first();

        if (!$pipe_setting) {
            return response()->json(['error' => "Pipedrive setting wasn't added in this brand"]);
        }

        $personResponse = $this->makeApiRequest($pipe_setting->url . '/persons/search?term=' . $email . '&exact_match=true', $pipe_setting->token);


        if (count($personResponse->data->items) === 0) {
            return response()->json(['error' => "The candidate isn't present in pipedrive"]);
        }

        $person = $personResponse->data->items[0]->item;
        $id = $person->id;
        $name = $person->name;
        $phone_no = isset($person->phones[0]) ? str_replace('+', '', $person->phones[0]) : '';

        // Get the status of the person's deals
        // $dealsResponse = $this->makeApiRequest($pipe_setting->url . '/persons/' . $id . '/deals?status=all_not_deleted', $pipe_setting->token);

        // if (!isset($dealsResponse->data[0])) {
        //     return response()->json(['error' => "User status isn't found"]);
        // }

        // $status = $dealsResponse->data[0]->status;

        //if ($status === 'won') {
            if ($brand_name == $brands->name) {

                $finalResult = $this->makeApiRequest($pipe_setting->url . '/persons/' . $id . '?', $pipe_setting->token);
                
                $country         = $finalResult->data->{'9454c36ad451a91ff4a7d6eecb49bec36a14ad48'} ?$finalResult->data->{'9454c36ad451a91ff4a7d6eecb49bec36a14ad48'} : '';
                $edu_data = $finalResult->data->{'eac67ba1b38f1749501fb4d8526f0ffec670267a'} ? $finalResult->data->{'eac67ba1b38f1749501fb4d8526f0ffec670267a'} : '';
                if ($edu_data) {
                    $educationArray = setEducationLevel();
                    $education_level = $educationArray[$edu_data];
                } else {
                    $education_level = '';
                }
                $occupation      = $finalResult->data->{'2c01723a86c611b09410aef6bbd28d42db706305'} ? $finalResult->data->{'2c01723a86c611b09410aef6bbd28d42db706305'} :'';
                $age             = $finalResult->data->{'7219491933372a53f81573177f6bb18ff526396a'} ? $finalResult->data->{'7219491933372a53f81573177f6bb18ff526396a'} : '';
                $city            = $finalResult->data->{'ce494a53880321513b79ee0aec75d9c8312f6f13'} ? $finalResult->data->{'ce494a53880321513b79ee0aec75d9c8312f6f13'} : '-';
            } else {
                $country = '';
                $education_level = '';
                $occupation = '';
                $age = '';
                $city = '-';
            }

            return response()->json([
                'name' => $name,
                'country' => $country,
                'education_level' => $education_level,
                'occupation' => $occupation,
                'age' => $age,
                'city' => $city,
                'phone_no' => $phone_no,
            ]);
        // } else {
        //     return response()->json(['error' => 'User status is ' . $status]);
        // }
    }

    function makeApiRequest($url, $token) {
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . '&api_token=' . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
    
        $response = curl_exec($curl);
        curl_close($curl);
    
        return json_decode($response);
    }

    public function sent_mail(Request $request)
    {
        try {
            $user = \Auth::user();
            $id = $request->get('id');
            $brand_name = $request->get('brandName');
      
            $MAIL_FILE = Config::get('constants.MAIL_FILE');

            $created_data = CreatedDateAssement::join('visa_type','visa_type.id','=','sent_mail.recommended_visa_type')->select('sent_mail.*','visa_type.name as recommended_visa_name')->where('sent_mail.id',$id)->first();

            if (!$created_data) {
                return response()->json(['error' => 'Email data not found.']);
            }
            
            $brands = Brand::where('name', 'like', '%' . $brand_name . '%')->first();
            if ($brands) {
                $allrepresentatives = Representative::whereRaw("FIND_IN_SET($brands->id, brand_id)")->orderby('id','DESC')->get();
            } else {
                $allrepresentatives = [];
            }

            $visa_type = [];

            if ( $created_data->visa_type_id) {
                $vt = VisaType::whereRaw("FIND_IN_SET(id, '$created_data->visa_type_id')")->get();
                
                if ($vt) {
                    $vt = $vt->toArray();
                    foreach($vt as $key=>$val) {

                        $visa_details = VisaTypeDetails::where('visa_type_id',$val['id'])->where('language_code',$created_data->language_code)->get();
                        $visaImages = CreateAssetmentImages::where('visa_type_id',$val['id'])->where('create_assetment_id',$id)->get();
                         if ( $visaImages ) {
                            foreach($visaImages as $key1=>$val1) {
                                $newArray = array();
                                $newArray['is_image'] = 1;
                                $newArray['visa_key'] = 'Your salary per region in Canada';
                                $newArray['value'] = $val1->value;
                                $visa_details[] = (object)$newArray;
                            }
                        }
                        $visa_type[$key] = $val;
                        $visa_type[$key]['visa_details'] = $visa_details;
                        $visa_type[$key]['visaImages'] = $visaImages;
                    }
                }
            }
            $representative = Representative::where('email', 'like', '%' . $user->email . '%')->first();

            //language wise
            $brand_about = '';
            if($created_data->language_code) {
                $a = 'about_'.$created_data->language_code;
                $brand_about = $brands->$a;
            } 
            //generate pdf
            $pdf = PDF::loadView('canadamigration_en',compact(['brands','allrepresentatives','representative','created_data','visa_type','brand_about']));
            $content = $pdf->output();
            $filename = 'generated_pdf_' . time() . '.pdf'; 
            $pdf_name = storage_path('app/public/' . $filename);
            file_put_contents($pdf_name, $content);
            //end pdf

            $smtpSettings = SmtpSetting::where('brand_id',$brands->id)->first();

            if (!$smtpSettings) {
                return response()->json(['error' => "SMTP settings for this brand have not been added"]);
            }

            config([
                'mail.mailers.smtp.host' => $smtpSettings->host,
                'mail.mailers.smtp.port' => $smtpSettings->port,
                'mail.mailers.smtp.encryption' => $smtpSettings->encryption,
                'mail.mailers.smtp.username' => $smtpSettings->username,
                'mail.mailers.smtp.password' => $smtpSettings->password,
            ]);

            $new_data = array(
                'pdf_title'=>$brands->pdf_title,
                'meeting_link'=>$brands->meeting_link,
                'name'=>$created_data->name,
            );

            $attachmentMimeType = 'application/octet-stream';
            Mail::send('emails.sent_mail',$new_data, function($message) use ($created_data,$smtpSettings,$pdf_name,$attachmentMimeType,$user) {
                $message
                    ->from($smtpSettings->username, 'Assetment Results Platform')
                    ->to($created_data->email)
                    ->cc([$user->email,$smtpSettings->cc_email])
                    ->subject("Sent Mail")
                    ->attach($pdf_name, [
                        'as' => pathinfo($pdf_name, PATHINFO_BASENAME), 
                        'mime' => $attachmentMimeType 
                    ]);
            });

            CreatedDateAssement::where('id',$id)->update(['is_sent_mail'=>1,'pdf_file'=>$filename]);

            return response()->json(['success'=>'Sent Mail successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function pdf_download($file_name)
    {
        $file = CreatedDateAssement::where('id',$file_name)->first();
        $myfile = storage_path('app/public/' . $file->pdf_file);
        return response()->download($myfile);
    }
   
}
