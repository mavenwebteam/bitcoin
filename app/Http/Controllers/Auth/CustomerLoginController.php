<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use App\Models\Customer;
class CustomerLoginController extends Controller
{
   
    public function __construct()
    {
      $this->middleware('guest:customer', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('customer.login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'name'   => 'required',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('customer')->attempt(['name' => $request->name, 'password' => $request->password])) {
        
       
        return view('customer.coin-market');
        
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('name', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/customer');
    }
}