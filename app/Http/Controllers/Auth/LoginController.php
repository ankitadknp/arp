<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\LoginHistory;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;


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
        $response = Http::get("https://ipinfo.io/{$ipAddress}/json");
        $data = $response->json();
        $country = $data['country'];  // Extract the country from the response

        return $country;
    }

    protected function authenticated(Request $request, $user)
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

        // Redirect the user to the intended URL (default is $redirectTo)
        return redirect()->intended($this->redirectTo);
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
