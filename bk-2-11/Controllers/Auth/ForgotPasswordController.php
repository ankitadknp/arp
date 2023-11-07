<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\SMTP;
use DB,Mail,Hash;
use Illuminate\Support\Facades\Config;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
       return view('auth/passwords.email');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $title =  Config::get('constants.TITLE');
     
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $data=[
            'email' =>$request->email,
            'token' =>$token
        ];

        DB::table('password_resets')->insert($data);
        
        Mail::send('emails.forgotpassword', ['token' => $token,'title'=> $title], function($message) use ($request) {
            $message->to($request->email)
                ->subject("Reset Password");
        });

        return back()->withStatus(__('We have e-mailed your password reset link!'));
    }
}
