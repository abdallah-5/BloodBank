<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Client;
use App\BloodType;
use App\Governorate;
class AuthController extends Controller
{
    public function login()
    {
      return view('front.login');

    }
    public function loginCheck(Request $request)
    {
      $rules = [
        'phone'             =>'required',
        'password'          =>'required',
      ];

      $messages = [
        'phone.required'    => 'Phone is required',
        'password.required' => 'Password is required'
      ];

      $this->validate($request, $rules, $messages);

      $credentials = [
        'phone' => $request['phone'],
        'password' => $request['password'],
    ];

    // Dump data
    //dd($credentials);

    if (auth()->guard('client-web')->attempt($credentials))
    {
      return redirect(route('client-home'));
    }
    else {
      return back();
    }
 }

    public function logout()
    {
      auth()->guard('client-web')->logout();
      return redirect(route('client-home'));


    }
    public function register()
    {
      return view('front.register');
    }

    public function registerSave(Request $request)
    {
      $rules = [
        'name'              =>'required',
        'password'          =>'required|confirmed',
        'phone'             =>'required|unique:clients',
        'email'             =>'required|unique:clients',
        'dob'               =>'required',
        'blood_type_id'     =>'required|exists:blood_types,id',
        'last_donation_date'=>'required',
        'city_id'           =>'required',
      ];

      $messages = [
        'name.required' => 'Name is required'
      ];

      $this->validate($request, $rules, $messages);

      $request->merge(['password' => bcrypt($request->password)]);
      $client = Client::create($request->all());
      $client->api_token = Str::random(60);
      $client->save();

      auth()->guard('client-web')->login($client);
      return redirect(route('client-home'));


    }

    public function profile()
    {
      $client = auth()->guard('client-web')->user();

      return view('front.profile',compact('client'));

    }
    public function updateProfile(Request $request)
    {

      $client = Auth::guard('client-web')->user();
      if($request->password)
      {
        $client->password=bcrypt($request->password);
      }

        $client->update($request->except('password'));

      return back();

    }

    public function notificationSetting(Request $request)
    {
      $blood_types = BloodType::pluck('id','name')->toArray();
      // dd($blood_types);
      $governorates = Governorate::pluck('id', 'name')->toArray();
      return view('front.notification-setting',compact('blood_types','governorates'));

    }
    public function notificationSettingUpdate(Request $request)
    {
      // dd(auth()->guard('client-web')->user());
      auth()->guard('client-web')->user()->governorates()->sync($request->governorates);
      auth()->guard('client-web')->user()->blood_types()->sync($request->blood_types);
      return back();
    }
}
