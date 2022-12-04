<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class otpverifycontroller extends Controller
{
    
    //
    function index(){
        $OTP=rand(100000,999999);
        
        $customer=Customer::where('name',Cache::get('name'))->firstOrFail();
        $customer->update([
            'otp'=>$OTP
        ]);
        $details = [
            'title' => 'Mail from binance gift card',
            'body' => $OTP.'  is your verification code',
        ];
        \Mail::to($customer->email)->send(new \App\Mail\MyTestMail($details));
        return view('customer.otpverify');
    }
    function verify(Request $request){
        $customer=Customer::where('name',Cache::get('name'))->firstOrFail();
        //dd($customer);
        if($customer->otp==$request->OTP){
            $customer->update([
                'otp_verify'=>1
            ]);
            return redirect('/customer/login');
        }else{
            echo "OTP does not match.";
        }
    }
}
