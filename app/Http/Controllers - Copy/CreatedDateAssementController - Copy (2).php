<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\CreatedDateAssement;
use App\Models\SmtpSetting;
use App\Models\VisaType;
use App\Models\PipedriveSetting;
use App\Models\Brand;
use App\Models\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator,File,Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;


class CreatedDateAssementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(Request $request)
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
            $q_brand = CreatedDateAssement::select('*')->where('is_sent_mail',0)->orderByDesc('created_at');

            
            return Datatables::of($q_brand)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($checkAuth){
                    $btn = '';
                    if ($row->is_sent_mail == 0) {
                        $btn = '<div data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Sent Mail" class="btn btn-sm btn-icon btn-outline-success btn-circle mr-2 edit sent_mail"><i class="fas fa-envelope"></i></div>';
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
        $user_id = \Auth::user()->id;
        $valArr = [];
        $valArr['name']      = 'required';
        $valArr['email']     = 'required|email|unique:sent_mail,email';
        $valArr['visa_type']     = 'required';
        $valArr['credit_score']     = 'required|integer|between:200,600';
       
        $validator = Validator::make($request->all(), $valArr);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if($request->id){
            $single = CreatedDateAssement::find($request->id);
        }

        $reqInt = [
            'visa_type' => $request->visa_type,
            'email' => $request->email,
            'representative_id' => $user_id,
            'name' => $request->name,
            'credit_score' => $request->credit_score,
            'is_sent_mail' =>0
        ];
   
        $rec = CreatedDateAssement::updateOrCreate(['id' => $request->id],$reqInt);

        if(isset($single) && $single){
            setActivityLog('PDF Updated [Name: ' . $request->name . ', ' . $request->email  . ']',json_encode($reqInt),activityEnums('visa-type'),$request->id,\Auth::user()->id);
        }else{
            setActivityLog('New PDF Added [Name: ' . $request->name . ', ' . $request->email  . ']',json_encode($reqInt),activityEnums('visa-type'),$rec->id,\Auth::user()->id);
        }

      

        return response()->json(['success'=>'PDF saved successfully!']);
    }

    public function search_email(Request $request) 
    {
        $email = $request->get('email');
        $brand_name = $request->get('brand_name');

        $brands = Brand::where('name', 'like', '%' . $brand_name . '%')->first();
        $pipe_setting = PipedriveSetting::where('brand_id',$brands->id)->first();

        if ($pipe_setting) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $pipe_setting->url.'/persons/search?term='.$email.'&exact_match=true&api_token='.$pipe_setting->token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: __cf_bm=7CtWBIcJpF_PMbt1HZGJYSUlxH1pJh1TeNfQzerQ1Pc-1695358388-0-AVYHlbr5OlKtJPy+0onV52RMAByL1J7Gd8VD/4vNqT4+kCJyPdk/sOFHc87FoCVFaNmZutWuabmdGJCug2dx7+Y='
            ),
            ));

            $person_response = curl_exec($curl);
            curl_close($curl);

            $person_data = json_decode($person_response);
            $id = $person_data->data->items[0]->item->id;
            $name = $person_data->data->items[0]->item->name;

            //List all persons associated with a deal

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $pipe_setting->url.'/persons/'.$id.'/deals?status=all_not_deleted&api_token='.$pipe_setting->token,
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
            $data = json_decode($response);

            $status = $data->data[0]->status;
            curl_close($curl);

            if ( $status == 'won') {
                return response()->json(['name'=>$name]);
            } else {
                return response()->json(['error' => 'User status is '.$status]);
            }

        }

    }

    public function sent_mail(Request $request)
    {
        try {

            $id = $request->get('id');
            $brand_name = $request->get('brandName');
            $brands = Pdf::where('brand_name', 'like', '%' . $brand_name . '%')->first();
      
            $pdf_name = '/var/www/html/arp/storage/app/public/'.$brands->pdf;
            $MAIL_FILE = Config::get('constants.MAIL_FILE');

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

            $data = CreatedDateAssement::find($id);

            if (!$data) {
                return response()->json(['error' => 'Email data not found.']);
            }

            $new_data = array(
                'email'=>$data->email,
                'name'=>$data->name,
                'credit_score'=>$data->credit_score,
                'visa_type'=>$data->visa_type,
            );

            Mail::send('emails.sent_mail',$new_data, function($message) use ($data,$smtpSettings,$pdf_name,$brands) {
                $message
                    ->from($smtpSettings->username, 'Assetment Results Platform')
                    ->to($data->email)
                    ->subject("Sent Mail")
                    ->attach($pdf_name, [
                        'as' => pathinfo($brands->pdf, PATHINFO_BASENAME), // The name you want for the attachment
                    ]);
            });

            CreatedDateAssement::where('id',$id)->update(['is_sent_mail'=>1,'pdf_file'=>$MAIL_FILE.$brands->pdf]);

            return response()->json(['success'=>'Sent Mail successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

   
}
