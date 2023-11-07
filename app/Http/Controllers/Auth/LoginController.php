<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\LoginHistory;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Mail,Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getUserCountry()
    {
        $ipAddress = \Request::ip();
        $response = Http::withoutVerifying()->get("https://ipinfo.io/{$ipAddress}/json");
        $data = $response->json();
        $country = (isset($data) && isset($data['country']))?$data['country']:'';  // Extract the country from the response
        return $country;
    }


    public function showOtpForm(Request $request)
    {
        return view('auth.verify_otp');
    }
    public function verify_otp(Request $request)
    {
        $env_dev = env('DEVELOPMENT_NAME');

        if ($env_dev == 'development' ) {
            $token = '123456';
        } else {
            $token = random_int(0, 999999);
        }
        
        $user = User::where('email', 'like', '%' . $request->email . '%')->first();

        if ($user) {
            if(Auth::attempt(['email' => $request->email, 'password' => ($request->password)]))
            { 

                User::where('id', $user->id )->update(['login_otp'=>$token]);

                $data=[	'email' =>$request->email,
                        'token' =>$token ];

                $newdata = array('token' => $token);
                $subject = 'Verify OTP for login';
                $env_email = env('MAIL_USERNAME');
            
                Mail::send('emails.sentotpforverifylogin', $newdata, function($message) use ($request, $subject, $env_email) {
                    $message->to($request->email)
                        ->from($env_email, 'Assetment Results Platform')
                        ->subject($subject);
                });

                return view('auth.verify_otp',['email' =>$request->email,'password'=>$request->password]);
            } else {
                Session::flash('error', "Email or password aren't valid");
                return redirect()->back();
            }
        } else {
            Session::flash('error', "User isn't found");
            return redirect()->back();
        }

    }

    public function user_login(Request $request)
    {

        $otp = $request->verify_otp;
        $email = isset($request->email) ? $request->email : '' ;
        $password = isset( $request->password ) ? $request->password : '' ;;

        $user = User::where('email', 'like', '%' . $email . '%')->first();

        if ($user->login_otp == $otp ) {
            if(Auth::attempt(['email' => $email, 'password' => ($password)]))
            { 
                if ($user->level == 1 ) {
                    $user_type = 'SubAdmin';
                }else {
                    $user_type = 'Representatives';
                }

                $country = $this->getUserCountry();
            
                if ($user->level == 1 || $user->level == 2) {
                    LoginHistory::insert([
                        'user_id' => $user->id,
                        'user_type' => $user_type,
                        'brand_id' => $user->brand_id,
                        'ipaddress' =>\Request::ip(),
                        'country' => $country,
                    ]);
                }
                return redirect()->route('home');
            } 
        } else {
            Session::flash('error', "OTP isn't correct");
            return view('auth.verify_otp',['email' =>$email,'password'=>$password]);
        }
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        if ($user->level == 2 ) {
            Cookie::queue(Cookie::forget('selectedBrand'));
            Cookie::queue(Cookie::forget('brandModalShown'));
        }

        $this->guard()->logout();

        $request->session()->invalidate();
    
        return redirect('/');
    }

    
}
