<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use Auth;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index()
    {
        $name=Auth::user()->name;
        $data=Invoice::where('username',$name)->orderBy('created_at','desc')->paginate(50); 
        return view('customer.index',[
            'data'=>$data
        ]);
    }
    public function order_list()
    {
        $name=Auth::user()->name;
        $data=Invoice::where('username',$name)->orderBy('created_at','desc')->paginate(50); 
        return view('customer.order_list',[
            'data'=>$data
        ]);
    }
    public function invoice($order_id)
    {
        $name=Auth::user()->name;
        $data=Invoice::where('order_id',$order_id)->first(); 
        return view('customer.invoice',[
            'data'=>$data
        ]);
    }
    public function registerCustomeradd()
    {
        return view('register');
    }
    public function coinMarket()
    {
        return view('customer.coin-market');
    }
    public function create_giftcard()
    {
        $name=Auth::user()->name;
        $data=Invoice::where('username',$name)->paginate(50); 
        return view('customer.buy-giftcard',[
            'data'=>$data
        ]);
    }
    public function buy_giftcard(Request $request)
    {
        $user = new Invoice;
        $user->username = $request->name;
        $user->phone =$request->phone;
        $user->email = $request->email;
        $user->facetoken = $request->coin;
        $user->amount = $request->amount;
        $user->paymentmethod = $request->paymentmethod;
        $user->transaction_id = $request->transaction_id;
        $user->order = 'processing';
        $user->order_id = 'Fx-'.mt_rand(1000000, 9999999);
        $user->save();
        $name=Auth::user()->name;
        $data=Invoice::where('username',$name)->orderBy('created_at','desc')->paginate(50); 
        return view('customer.index',[
            'data'=>$data
        ]);
    }
    public function registerCustomer(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:8',
            'email' => 'required|unique:customer',
        ]);
            $user = new Customer;
            $user->name = $request->name;
            $user->phone =$request->countrycode . $request->phonenumber;
            $user->email = $request->email;
            $user->type = 'customer';
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('index');

    }
}
