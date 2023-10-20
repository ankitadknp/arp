<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB,Hash,Validator;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token) {
        return view('auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);
    }
    function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[0-9])(?=.*[A-Za-z])(?=.*[\W_]).+$/',
            'password_confirmation' => 'required'
        ],
        [
            'password.regex' => 'The password must contain at least one digit, one letter, and one special character.',
        ]);
        $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
        
        return redirect('/login')->withStatus(__('Your password has been changed!'));
    }
}
