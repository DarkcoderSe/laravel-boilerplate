<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Mail;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')->withErrors(['Make sure to fill in all fields'])->withInput();
        }

        if(Auth::guard('customer')->attempt(['email'=>$request->email, 
        'password'=> $request->password])) {
            return redirect('/select-plan');  
        }  
        return redirect('login')
        ->with('error', 'Invalid Credentials');      
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:customers,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {

            return redirect('register')->withErrors(['Make sure to fill in all fields'])->withInput();
        }

        try {

            $customer = Customer::create([
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => Hash::make($request->password),
            ]);
            Auth::guard('customer')->login($customer);
        } catch (\Exception $e) {
            return redirect('register')->withErrors($e->getMessage());
        }

        return redirect('login')
            ->with('success', 'Registered successfully');
    }

    public function redirectToProvider($driver)
    {
        if (!$this->isProviderAllowed($driver)) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty($user->email)
        ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
        : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse()
    {
        return redirect()->intended('customer');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }
    
    public function forgotPasswordWeb(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $customer=Customer::where('email',$request->email)->first();
        if(!$customer){       
            $message="This email address is not registered with us!";       
            return view('forgot-password', compact('message'));
        }

        $token = Str::random(64);
        $customer->token_forgot_password=$token;
        $customer->save();

        Mail::to($customer->email)->send(new ForgotPassword($token));
        $message="The mail with link to reset your password has been sent!";
    
        return view('forgot-password', compact('message'));
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $customer=Customer::where('email',$request->email)->first();
        if(!$customer){
            $json['code']=403;
            $json['message']="This email address is not registered with us!";
            $json['data']=null;
            return response()->json($json);
        }

        $token = Str::random(64);
        $customer->token_forgot_password=$token;
        $customer->save();

        Mail::to($customer->email)->send(new ForgotPassword($token));
        $json['data']=null;
        $json['message']="The mail with link to reset your password has been sent!";
        $json['code']=200;

        return response()->json($json);

    }
    public function reset_password($token, Request $req)
    {
        $customer=Customer::where('token_forgot_password',$token)->first();

        if($customer==null){
            $json['data']=null;
            $json['message']="token not  found";
            $json['code']=400;

            return redirect('login')->withErrors($json['message']);
        }
        $customer->password=bcrypt($req->password);
        $customer->save();

        $json['data']=$customer;
        $json['message']="reset password has been success";
        $json['code']=200;

        return  redirect('login');
    }
    function url_reset_password($token){
        return view('customer.reset_password',compact('token'));
    }

}
