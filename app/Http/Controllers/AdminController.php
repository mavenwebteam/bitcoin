<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Admin;
use App\Models\Invoice;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Invoicemail;
use Illuminate\Support\Facades\Hash;

use App\Constants\Constant;
class AdminController extends Controller
{
    // API KEY information set up
	
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $name=Auth::user()->name;
        $data=Invoice::where('order','processing')->orderBy('username')->paginate(50); 
        $all_data=Invoice::orderBy('created_at','desc')->paginate(50); 
        // return view('admin.index',[
        //     'data'=>$data,
        //     'all_data'=>$all_data
        // ]);
        return view('admin.index',['data'=>$data,'all_data'=>$all_data]);
    }
    public function invoice($order_id)
    {
        $name=Auth::user()->name;
        $data=Invoice::where('order_id',$order_id)->first(); 
        return view('admin.invoice',[
            'data'=>$data
        ]);
    }
    public function confirm($order_id){
        $data=Invoice::where('order_id',$order_id)->first();
        $response = self::signedRequest('POST', 'sapi/v1/giftcard/createCode', [
            'token' => 'USDT',
            'amount'=>$data->amount,
          ]);
          echo "<h2>Create Code Response:</h2>";
          echo "<h4 style='color:#000088;'>".json_encode($response)."</h4>";
          
          $code = $response['data']['code'];
          $referenceNo = $response['data']['referenceNo'];
        
        $responseCreateCode = signedRequest('POST','/sapi/v1/giftcard/redeemCode',[
        'code' => $code
        ]);
            echo "<h2>redeemCode Code Response:</h2>";
            echo "<h4 style='color:#000088;'>".json_encode($responseCreateCode)."</h4>";
            
        $responseVerify = signedRequest('GET','/sapi/v1/giftcard/verify',['referenceNo'=>$referenceNo]);
            echo "<h2>Verify Code Response:</h2>";
            echo "<h4 style='color:#000088;'>".json_encode($responseVerify)."</h4>";
            

            $data->update([
                'order'=>"confirmed",
                'referenceno'=>$referenceNo
            ]);
            $details = $details = [
                'title' => 'Mail from binance gift card',
                'username' => $data->username,
                'email'=>$data->email,
                'order_id'=>$data->order_id,
                'date'=>$data->updated_at,
                'phone'=>$data->phone,
                'amount'=>$data->amount,
                'reference_no'=>$data->referenceno
            ];
            //Mail::to($data->email)->send(new \App\Mail\Invoicemail($details));
        return redirect('/admin');
    }
    public function user()
    {
        $name=Auth::user()->name;
        $data=Admin::where('name',$name)->paginate(50); 
        return view('admin.user',[
            'data'=>$data
        ]);
    }
    public function registerCustomeradd()
    {
        return view('register');
    }
    public function coinMarket()
    {
        return view('admin.coin-market');
    }
    public function create_giftcard()
    {
        $name=Auth::user()->name;
        $data=Customer::where('name',$name)->paginate(50); 
        return view('customer.buy-giftcard',[
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
    public function registerAdminadd()
    {
        return view('admin.register-admin');
    }
    public function registerAdmin(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:8',
            'email' => 'required',
        ]);
            $user = new Admin;
            $user->name = $request->name;
            $user->phone ='(+'.$request->countrycode.')' . $request->phonenumber;
            $user->email = $request->email;
            $user->type = 'customer';
            $user->password = Hash::make($request->password);
            $user->save();
            return view('admin.coin-market');

    }


    /* HERE IS API FUNCTIONS */
    public function signature($query_string, $secret){
		return hash_hmac('sha256', $query_string, $secret);
	}
    public function sendRequest($method, $path) {
        $API_KEY=Constant::API_KEY;
        $BASE_URL=Constant::BASE_URL;

        $url = "${BASE_URL}${path}";

        //echo "requested URL: ". PHP_EOL;
        //echo $url. PHP_EOL;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-MBX-APIKEY:'.$API_KEY));    
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $method == "POST" ? true : false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $execResult = curl_exec($ch);
        $response = curl_getinfo($ch);
  
        // if you wish to print the response headers
        // echo print_r($response);

        curl_close ($ch);
        return json_decode($execResult, true);
    }

        public function signedRequest($method, $path, $parameters = []) {
        $SECRET=Constant::SECRET;

        $parameters['timestamp'] = round(microtime(true) * 1000);
        $query = self::buildQuery($parameters);
        $signature = self::signature($query, $SECRET);
        return self::sendRequest($method, "${path}?${query}&signature=${signature}");
        }
        public function buildQuery(array $params){
            $query_array = array();
            foreach ($params as $key => $value) {
            if (is_array($value)) {
                $query_array = array_merge($query_array, array_map(function ($v) use ($key) {
                    return urlencode($key) . '=' . urlencode($v);
                }, $value));
            } else {
                $query_array[] = urlencode($key) . '=' . urlencode($value);
            }
            }
            return implode('&', $query_array);
    }
}
