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
        $languages = Language::all();
        $visatypes = VisaType::all();
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
    //     $languages = Language::all();
    //     $user = \Auth::user();
    //     $brand_ids = $user->brand_id;
    //     $brands = explode(",",$brand_ids);
    //     $brand = DB::table('brands')->join('users', 'brands.id', '=', 'users.brand_id')->select('brands.name')->where('users.id',$user->id)->first();

    //     $data = [
    //         'visatypes'  => $visatypes,
    //            'languages'  => $languages,
    //         'brands'     => $brands,
    //         'brand'     => $brand,
    //         'menu'       => 'menu.v_menu_admin',
    //         'content'    => 'content.view_created_date_assement',
    //         'title'      => 'Create Assement PDF'
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
        $valArr['case_number']            = 'required';
        $valArr['city']                   = 'required';
        $valArr['language_code']          = 'required';
        $valArr['phone_no']               = 'required|string|min:7';
     
       
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
            'case_number'             => ($request->case_number) ? $request->case_number : '',
            'is_sent_mail'           => 0,
            'phone_no'               => $request->phone_no,
            'city'                   => $request->city,
            'language_code'          => $request->language_code,
            'conclusion'             => $request->conclusion,
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

        if (empty($email)) {
            return response()->json(['error' => "Email is required"]);
        }

        $checkEmail = CreatedDateAssement::where('email', 'like', '%' . $email . '%')->first();

        if ($checkEmail) {
            return response()->json(['error' => "The mail has already been sent"]);
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
        $dealsResponse = $this->makeApiRequest($pipe_setting->url . '/persons/' . $id . '/deals?status=all_not_deleted', $pipe_setting->token);

        if (!isset($dealsResponse->data[0])) {
            return response()->json(['error' => "User status isn't found"]);
        }

        $status = $dealsResponse->data[0]->status;

        if ($status === 'won') {
            if ($brand_name == $brands->name) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.pipedrive.com/v1/persons/2315?api_token=02f14f76be9bce4fab8dfc1053f0c3d59490085a',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Cookie: __cf_bm=E1q_VL9JUsPlk8iDskEKlkiKcHc3eTmezr5VBvBS1XE-1697200189-0-ATCbJMd9ha27kaRbI6znGFg5y3V/mlrH7pQBXutP5gYfVDruOSVxTJpafOdfyANP5/8NaWmfoWwSLdy1YaEfAxE='
                    ),
                ));

                $pesronsResponse = curl_exec($curl);
                curl_close($curl);
                $finalResult = json_decode($pesronsResponse);
                
                $country         = $finalResult->data->{'9454c36ad451a91ff4a7d6eecb49bec36a14ad48'} ?$finalResult->data->{'9454c36ad451a91ff4a7d6eecb49bec36a14ad48'} : '';
                $education_level = $finalResult->data->{'eac67ba1b38f1749501fb4d8526f0ffec670267a'} ? $finalResult->data->{'eac67ba1b38f1749501fb4d8526f0ffec670267a'} : '';
                $occupation      = $finalResult->data->{'2c01723a86c611b09410aef6bbd28d42db706305'} ? $finalResult->data->{'2c01723a86c611b09410aef6bbd28d42db706305'} :'';
                $age             = $finalResult->data->{'7219491933372a53f81573177f6bb18ff526396a'} ? $finalResult->data->{'7219491933372a53f81573177f6bb18ff526396a'} : '';
                $city            = $finalResult->data->{'ce494a53880321513b79ee0aec75d9c8312f6f13'} ? $finalResult->data->{'ce494a53880321513b79ee0aec75d9c8312f6f13'} : '';
            } else {
                $country = '';
                $education_level = '';
                $occupation = '';
                $age = '';
                $city = '';
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
        } else {
            return response()->json(['error' => 'User status is ' . $status]);
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

            $created_data = CreatedDateAssement::join('visa_type','visa_type.id','=','sent_mail.recommended_visa_type')->select('sent_mail.*','visa_type.name as recommended_visa_name')->where('sent_mail.id',$id)->first();


            if (!$created_data) {
                return response()->json(['error' => 'Email data not found.']);
            }
            
            $brands = Brand::where('name', 'like', '%' . $brand_name . '%')->first();
            if ($brands) {
                $allrepresentatives = Representative::whereRaw("FIND_IN_SET($brands->id, brand_id)")->get();
            } else {
                $allrepresentatives = [];
            }

            $visa_type = [];
            if ( $created_data->visa_type_id) {
                $vt = VisaType::whereRaw("FIND_IN_SET(id, '$created_data->visa_type_id')")->get();
                
                if ($vt) {
                    $vt = $vt->toArray();
                    foreach($vt as $key=>$val) {
                       $visa_details = VisaTypeDetails::where('visa_type_id',$val['id'])->where('language_code',$created_data->language_code)->pluck('value','visa_key');
                       $visa_type[$key] = $val;
                       $visa_type[$key]['visa_details'] = $visa_details;
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
            $pdf = PDF::loadView('pdf_new',compact(['brands','allrepresentatives','representative','created_data','visa_type','brand_about']));
            $content = $pdf->output();
            $filename = 'generated_pdf_' . time() . '.pdf'; 
            $pdf_name = storage_path('app/public/' . $filename);
            file_put_contents($pdf_name, $content);
            //end pdf

            // $filename = 'generated_pdf_' . time() . '.pdf'; 

            // $html = View::make('pdf_new', [
            //     'brands' => $brands,
            //     'allrepresentatives' => $allrepresentatives,
            //     'representative' => $representative,
            //     'created_data' => $created_data,
            //     'visa_type' => $visa_type,
            //     'brand_about' => $brand_about,
            // ])->render();

            // // Initialize Dompdf
            // $options = new Options();
            // $options->set('debugKeepTemp', true);
            // $options->set('isPhpEnabled', true);
            // $dompdf = new Dompdf($options);
            // $dompdf->loadHtml($html); // Load the HTML content
            // $dompdf->setPaper('A4', 'portrait');   // Set paper size (optional)
            // $dompdf->render();
            // $dompdf->stream($filename); // This will stream the PDF to the browser
            // $content = $dompdf->output(); // Capture the PDF content
            // $filename = 'generated_pdf_' . time() . '.pdf';
            // $pdf_name = storage_path('app/public/' . $filename);
            // file_put_contents($pdf_name, $content);
            

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
                'email'=>$created_data->email,
                'name'=>$created_data->name,
                'credit_score'=>$created_data->credit_score,
            );

            $attachmentMimeType = 'application/octet-stream';
            Mail::send('emails.sent_mail',$new_data, function($message) use ($created_data,$smtpSettings,$pdf_name,$attachmentMimeType,$user) {
                $message
                    ->from($smtpSettings->username, 'Assetment Results Platform')
                    ->to($created_data->email)
                    ->cc([$user->email,$smtpSettings->cc_email])
                    // ->to('jasminh.knp@gmail.com')
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
