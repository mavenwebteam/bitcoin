<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
class CustomerAddController extends Controller
{
    public function registerCustomeradd()
    {
        return view('register-customer');
    }
    public function registerCustomer(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:8',
            'email' => 'required',
        ]);
            $user = new Customer;
            $user->name = $request->name;
            $user->phone ='(+'.$request->countrycode.')' . $request->phonenumber;
            $user->email = $request->email;
            $user->type = 'customer';
            $user->password = Hash::make($request->password);
            $user->save();
            //return view('customer.login');
            $expiresAt = Carbon::now()->addMinutes(10);
            Cache::put('name', $request->name, $expiresAt);
            return redirect('/customer/otpverify');

    }
}
