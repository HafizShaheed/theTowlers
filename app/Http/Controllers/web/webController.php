<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\products\product;
use App\Models\products\categories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Hash;
use DB;



class webController extends Controller
{

    function index(){
        if (auth()->user()) {
            $data['title'] = "Client Dashboard";
        $data['page'] = "Dashboard";
        $data['pageIntro'] = "Introducing Client Dashboard";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        return view('company.index',$data);
        }else{
            return view('login');
        }

    }




    function loginSubmitclient(Request $request){

        $data = $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => '1'])){

            return redirect(route('company.dashboard'));
        }else{

            return redirect()->back()->with('error', 'Authentication Error');
        }
    }




    // forget password

    function showForgetPasswordForm(){

        return view('web.forgetPassword');
    }

    function submitForgetPasswordForm(Request $request){


        $request->validate([
            'email' => 'required|email|exists:tbl_users_info',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);

        Mail::send('mail.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');

    }

    public function showResetPasswordForm($token) {


        return view('web.forgetPasswordLink', ['token' => $token]);
     }


    public function submitResetPasswordForm(Request $request)
    {
          $request->validate([

              'password' => '|required_with:confirmation_password|same:confirmation_password',
              'confirmation_password' => 'required'
          ]);
          $updatePassword = DB::table('password_resets')
                              ->where([ 'token' => $request->token])->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          $user = User::where('email', $updatePassword->email)
                      ->update(['password' => Hash::make($request->password)]);
          DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

          return redirect('login')->with('message', 'Your password has been changed!');

    }



    function logout(){
        Auth::logout();

        return redirect(route('web.login'))->with('error', 'Account Logged Out.');
    }
}
