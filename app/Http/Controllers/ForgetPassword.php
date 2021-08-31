<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\sellers;
use Illuminate\Support\Facades\Mail;
use App\Models\users;
use Illuminate\Support\Facades\Hash;
class ForgetPassword extends Controller
{

    public function user_forget_pass()
    {
       return view('forget.user_email');
    }

    public function user_postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        Mail::send('forget.user_verify',['token' => $token], function($message) use ($request) {
                  $message->from($request->email);
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });

        return back()->with('message', 'We have sent reset password link, to your email.');
    }

     public function user_updatePassword(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required',

         ]);

         $updatePassword = DB::table('password_resets')
                             ->where(['email' => $request->email, 'token' => $request->token])
                             ->first();

         if(!$updatePassword)
             return back()->withInput()->with('error', 'Invalid token!');

           $user = users::where('email', $request->email)
                       ->update(['password' => Hash::make($request->password)]);

           DB::table('password_resets')->where(['email'=> $request->email])->delete();

           return redirect('/login')->with('message', 'Your password has been changed!');
     }

    public function forget_pass()
    {
       return view('forget.email');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:sellers',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('forget.verify',['token' => $token], function($message) use ($request) {
                  $message->from($request->email);
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });

        return back()->with('message', 'We have sent reset password link, to your email.');
    }
    public function getPassword($token) {

        return view('forget.reset', ['token' => $token]);
     }

     public function updatePassword(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:sellers',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required',

         ]);

         $updatePassword = DB::table('password_resets')
                             ->where(['email' => $request->email, 'token' => $request->token])
                             ->first();

         if(!$updatePassword)
             return back()->withInput()->with('error', 'Invalid token!');

           $user = sellers::where('email', $request->email)
                       ->update(['password' => Hash::make($request->password)]);

           DB::table('password_resets')->where(['email'=> $request->email])->delete();

           return redirect('/sellerLogInPage')->with('message', 'Your password has been changed!');
     }
}
