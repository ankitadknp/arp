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
use App\Models\PdfDesign;
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

    public function search_list(Request $request)
    {
        $visatypes = VisaType::all();
        $user = \Auth::user();
        $brand_ids = $user->brand_id;
        $brands = explode(",",$brand_ids);
        $brand = DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();

        $data = [
            'visatypes'  => $visatypes,
            'brands'     => $brands,
            'brand'     => $brand,
            'menu'       => 'menu.v_menu_admin',
            'content'    => 'content.view_created_date_assement',
            'title'      => 'Created Date Assement'
        ];

        $checkAuth = \Auth::user()->level;
        if ($request->ajax()) {
            $q_brand = CreatedDateAssement::select('*')->orderByDesc('created_at');

            
            return Datatables::of($q_brand)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($checkAuth){
                    $btn = '';
                    if ($row->is_sent_mail == 0) {
                        $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Sent Mail" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2  sent_mail"><i class="fas fa-envelope"></i></div>';
                    }
                    $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit edit"><i class=" fi-rr-edit"></i></div>';

                    return $btn;

                    })
                    ->make(true);
        }

        if ($checkAuth == 2) {
            return view('layouts.v_template',$data);
        }
        return view('layouts.v_not_representative');

    }

    public function index(Request $request) {}

    // public function search_list(Request $request)
    // {
    //     $search_email = $request->get('search_email_filters');
    //     $visatypes  = VisaType::all();
    //     $user = \Auth::user();
    //     $brand_ids = $user->brand_id;
    //     $brands = explode(",",$brand_ids);
    //     $brand = DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();

    //     $data = [
    //         'visatypes'  => $visatypes,
    //         'brands'     => $brands,
    //         'brand'     => $brand,
    //         'menu'       => 'menu.v_menu_admin',
    //         'content'    => 'content.view_created_date_assement',
    //         'title'      => 'Created Date Assement'
    //     ];

    //     $checkAuth = \Auth::user()->level;
    //     if ($request->ajax()) {

    //         if ($search_email !== null) {
    //             $q_brand = CreatedDateAssement::select('*')->where('email', 'like', '%' . $search_email . '%')->where('is_sent_mail',0)->orderByDesc('created_at');

            
    //             return Datatables::of($q_brand)
    //                 ->addIndexColumn()
    //                 ->addColumn('action', function($row) use($checkAuth){
    //                 $btn = '';
    //                 if ($row->is_sent_mail == 0) {
    //                     $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Sent Mail" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2  sent_mail"><i class="fas fa-envelope"></i></div>';
    //                 }
    //                     $btn = $btn.'<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit edit"><i class=" fi-rr-edit"></i></div>';

    //                 return $btn;

    //                 })
    //                 ->make(true);
    //         } else {
    //             // Return an empty result when search_email is null
    //             return Datatables::of([])
    //                 ->make(true);
    //         }
    //     }

    //     if ($checkAuth == 2) {
    //         return view('layouts.v_template',$data);
    //     }
    //     return view('layouts.v_not_representative');

    // }

    public function store(Request $request)
    {
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
        $valArr['age']                    = 'required|integer';
        $valArr['country']                = 'required';
        $valArr['education_level']        = 'required';  
        $valArr['occupation']             = 'required';
        $valArr['noc_number']             = 'required';
        $valArr['city']                   = 'required';
        $valArr['phone_no']               = 'required|string|min:7|max:12';
     
       
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
            'country'                => ($request->country) ? $request->country:'',
            'occupation'             => ($request->occupation) ? $request->occupation :'',
            'education_level'        => ($request->education_level) ? $request->education_level : '',
            'age'                    => ($request->age ) ? $request->age : '',
            'noc_number'             => ($request->noc_number) ? $request->noc_number : '',
            'is_sent_mail'           => 0,
            'phone_no'               => $request->phone_no,
            'city'                   => $request->city,
        ];
   
        $rec = CreatedDateAssement::updateOrCreate(['id' => $request->id],$reqInt);

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
        return response()->json($data);

    }

    public function search_email(Request $request) 
    {
        $email = $request->get('email');
        $brand_name = $request->get('brand_name');

        if ($email == '' ) {
            return response()->json(['error' => "Email is required"]);
        }

        $checkEmail = CreatedDateAssement::where('email', 'like', '%' . $email . '%')->first();

        if ($checkEmail) {
            return response()->json(['error' => "The mail has already been sent"]);
        }

        $brands = Brand::where('name', 'like', '%' . $brand_name . '%')->first();
        $pipe_setting = PipedriveSetting::where('brand_id',$brands->id)->first();

        if ($pipe_setting) 
        {
            $personResponse = $this->makeApiRequest($pipe_setting->url . '/persons/search?term=' . $email . '&exact_match=true', $pipe_setting->token);

            if (count($personResponse->data->items) === 0) {
                return response()->json(['error' => "The candidate isn't present in pipedrive"]);
            }

            if (isset($personResponse->data->items[0])) {
                $person          = $personResponse->data->items[0]->item;
                $id              = $person->id;
                $name            = $person->name;
                $country         = isset($person->country) ? $person->country : '';
                $education_level = isset($person->education_level) ? $person->education_level : '';
                $occupation      = isset($person->occupation) ? $person->occupation : '';
                $age             = isset($person->age) ? $person->age : '';
                $noc_number      = isset($person->noc_number) ? $person->noc_number : '';
                $city            = isset($person->city) ? $person->city : '';
                $phone_no        = isset($person->phone_no) ? $person->phone_no : '';
        
                // Get the status of the person's deals
                $dealsResponse = $this->makeApiRequest($pipe_setting->url . '/persons/' . $id . '/deals?status=all_not_deleted', $pipe_setting->token);
        
                if (isset($dealsResponse->data[0])) {
                    $status          = isset($dealsResponse->data[0]->status) ? $dealsResponse->data[0]->status :'';
                    $country         = isset($dealsResponse->data[0]->country) ? $dealsResponse->data[0]->country :'';
                    $education_level = isset($dealsResponse->data[0]->education_level) ? $dealsResponse->data[0]->education_level :'';
                    $occupation      = isset($dealsResponse->data[0]->occupation) ? $dealsResponse->data[0]->occupation :'';
                    $age             = isset($dealsResponse->data[0]->age) ? $dealsResponse->data[0]->age :'';
                    $noc_number      = isset($dealsResponse->data[0]->noc_number) ? $dealsResponse->data[0]->noc_number :'';
                    $city            = isset($dealsResponse->data[0]->city) ? $dealsResponse->data[0]->city :'';
                    $phone_no        = isset($dealsResponse->data[0]->phone_no) ? $dealsResponse->data[0]->phone_no :'';
        
                    if ($status == 'won') {
                        return response()->json([
                            'name' => $name,
                            'country' => $country,
                            'education_level' => $education_level,
                            'occupation' => $occupation,
                            'age' => $age,
                            'noc_number' => $noc_number,
                            'city'     => $city,
                            'phone_no' => $phone_no,
                        ]);
                    } else {
                        return response()->json(['error' => 'User status is ' . $status]);
                    }
                } else {
                    return response()->json(['error' => "User status is't found"]);
                }
            }
        } else {
            return response()->json(['error' => "Pipedrive setting wasn't added in this brand "]);
        }
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
            CURLOPT_HTTPHEADER => array(
                'Cookie: __cf_bm=fQeN9VVj1FHhWALwh8hHddHpRs.iIMOroyMWo.vSZs8-1695983448-0-Ae3kxdjG+cg2m/iGCXRU++cy4GZIHX7NxFuz6PyPM80QvIAaoHFZkN3ZlLw/19NuRtEMsI0KsAuVW0d3j8OrLAE='
            ),
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

            $created_data = CreatedDateAssement::join('visa_type','visa_type.id','=','sent_mail.recommended_visa_type')->select('sent_mail.*','visa_type.name as recommended_visa_name','visa_type.description')->where('sent_mail.id',$id)->first();

            if (!$created_data) {
                return response()->json(['error' => 'Email data not found.']);
            }
            
            $brands = Brand::where('name', 'like', '%' . $brand_name . '%')->first();
            if ($brands) {
                $allrepresentatives = Representative::whereRaw("FIND_IN_SET($brands->id, brand_id)")->get();
            } else {
                $allrepresentatives = [];
            }

            if ( $created_data->visa_type_id) {
                $visa_type = VisaType::whereRaw("FIND_IN_SET(id, '$created_data->visa_type_id')")->get();
            }
            $representative = Representative::where('email', 'like', '%' . $user->email . '%')->first();
            
            //generate pdf
            $pdf = PDF::loadView('pdf_to_html',compact(['brands','allrepresentatives','representative','created_data','visa_type']));
            $content = $pdf->output();
            $filename = 'generated_pdf_' . time() . '.pdf'; 
            $x= storage_path('app/public/' . $filename);
            file_put_contents($x, $content);
            $pdf_name = '/var/www/html/arp/storage/app/public/' . $filename;
            //end pdf

            $smtpSettings = SmtpSetting::first();

            if (!$smtpSettings) {
                return response()->json(['error' => 'SMTP settings not found.']);
            }

            config([
                'mail.mailers.smtp.host' => $smtpSettings->host,
                'mail.mailers.smtp.port' => $smtpSettings->port,
                'mail.mailers.smtp.encryption' => $smtpSettings->encryption,
                'mail.mailers.smtp.username' => $smtpSettings->username,
                'mail.mailers.smtp.password' => $smtpSettings->password,
            ]);

            $new_data = array(
                'email'=>$created_data->email,
                'name'=>$created_data->name,
                'credit_score'=>$created_data->credit_score,
            );

            $imageExtension = pathinfo($pdf_name, PATHINFO_EXTENSION);
            $mimeTypes = [
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
            ];
            $attachmentMimeType = $mimeTypes[$imageExtension] ?? 'application/octet-stream';
            Mail::send('emails.sent_mail',$new_data, function($message) use ($created_data,$smtpSettings,$pdf_name,$attachmentMimeType) {
                $message
                    ->from($smtpSettings->username, 'Assetment Results Platform')
                    ->to($created_data->email)
                    // ->to('ankitad.knp@gmail.com')
                    ->subject("Sent Mail")
                    ->attach($pdf_name, [
                        'as' => pathinfo($pdf_name, PATHINFO_BASENAME), // The name you want for the attachment
                        'mime' => $attachmentMimeType 
                    ]);
            });

            // CreatedDateAssement::where('id',$id)->update(['is_sent_mail'=>1,'pdf_file'=>$MAIL_FILE.$filename]);

            return response()->json(['success'=>'Sent Mail successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

   
}
