<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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
    // public function showLinkRequestForm() 
    // {
    //     return view('auth/passwords.email');
    // }

    // public function sendResetLinkEmail(Request $request) 
    // {
    //     $title =  Config::get('constants.TITLE');
    //     $user_data = User::where('email',$request->email)->first();

    //     if (empty($user_data)) 
    //     {
    //         return redirect()->route('password.email')->withErrors(['email' => 'Invalid email']);
    //         // return response()->json(['error' => 'Invalid email'], 404);
    //         // return \Redirect::back()->withErrors(["Invalid email"]);
    //     } else {
    //         $token = random_int(0, 999999);
    //         $newdata = array('token' => $token, 'name'=>$user_data->name,'title'=>$title );

    //         $data=[
    //             'email' =>$request->email,
    //             'token' =>$token,
    //             'created_at' =>date('Y-m-d H:i:s')
    //         ];

    //         DB::table('password_resets')->insert($data);
        
    //         $subject = "Reset your password - $title";

    //         $env_email = env('MAIL_USERNAME');
            
    //         Mail::send('emails.forgotpassword', $newdata, function($message) use ($request, $subject) {
    //             $message->to($request->email)
    //                 ->from('test.knptech@gmail.com', 'Forgot Password')
    //                 ->subject($subject);
    //         });

    //         return redirect()->route('password.reset_password')->with('message', 'We have sent you One Time Password (OTP) to your registered email address! If you have not received an email please check your Spam or Junk mail folder.');
    //     }
    // }

    public function showLinkRequestForm()
    {
       return view('auth/passwords.email');
    }
    public function sendResetLinkEmail(Request $request)
    {
     
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $data=[
            'email' =>$request->email,
            'token' =>$token
        ];

        DB::table('password_resets')->insert($data);
        
        Mail::send('emails.admin_forgotpassword', ['token' => $token], function($message) use ($request) {
            $message->to($request->email)
                ->subject("Reset Password");
        });

        return back()->withStatus(__('We have e-mailed your password reset link!'));
    }
}
