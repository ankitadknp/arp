<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Mail,Hash,DB; 
use App\Models\User;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\SMTP;

class ForgotPasswordController extends Controller 
{

    public function showLinkRequestForm() 
    {
        return view('auth/passwords.email');
    }

    public function sendResetLinkEmail(Request $request) 
    {
        $title =  Config::get('constants.TITLE');
        $user_data = User::where('email',$request->email)->first();

        if (empty($user_data)) 
        {
            return redirect()->route('password.email')->withErrors(['email' => 'Invalid email']);
            // return response()->json(['error' => 'Invalid email'], 404);
            // return \Redirect::back()->withErrors(["Invalid email"]);
        } else {
            $token = random_int(0, 999999);
            $newdata = array('token' => $token, 'name'=>$user_data->name,'title'=>$title );

            $data=[
                'email' =>$request->email,
                'token' =>$token,
                'created_at' =>date('Y-m-d H:i:s')
            ];

            DB::table('password_resets')->insert($data);
        
            $subject = "Reset your password - $title";

            $env_email = env('MAIL_USERNAME');
            
            Mail::send('emails.forgotpassword', $newdata, function($message) use ($request, $subject) {
                $message->to($request->email)
                    ->from('test.knptech@gmail.com', 'Forgot Password')
                    ->subject($subject);
            });

            return redirect()->route('password.reset_password')->with('message', 'We have sent you One Time Password (OTP) to your registered email address! If you have not received an email please check your Spam or Junk mail folder.');
        }
    }
}
