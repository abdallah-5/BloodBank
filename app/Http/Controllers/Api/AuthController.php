<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Client;
use App\Token;
 use App\Mail\ResetPassword;

class AuthController extends Controller
{


  ////////////////////////////// start register ///////////////
  public function register(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'name'              =>'required',
      'password'          =>'required|confirmed',
      'phone'             =>'required|unique:clients',
      'email'             =>'required|unique:clients',
      'dob'               =>'required',
      'blood_type_id'     =>'required|exists:blood_types,id',
      'last_donation_date'=>'required',
      'city_id'           =>'required',

    ]);

    if($validator->fails())
    {
      return responseJeson(0, $validator->errors()->first(), $validator->errors());
    }
    $request->merge(['password' => bcrypt($request->password)]);
    $client = Client::create($request->all());
    $client->api_token = Str::random(60);
    $client->save();

    return responseJeson(1, 'success',[
      'api_token' => $client->api_token,
      'client' => $client
    ]);
  }
  ////////////////////////////// end register ///////////////

  ////////////////////////////// start login ///////////////

  public function login(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'phone'             =>'required',
      'password'          =>'required',

    ]);

    if($validator->fails())
    {
      return responseJeson(0, $validator->errors()->first(), $validator->errors());
    }
    $client = Client::where('phone',$request->phone)->first();
    if($client){
      if(Hash::check($request->password, $client->password))
      {
        return responseJeson(1,'logged',[
          'api_token'=> $client->api_token,
          'client'=> $client
        ]);
      }
      else{
            return responseJeson(0,'البيانات غير صحيحة');
      }
    }
    else {
          return responseJeson(0,'البيانات غير صحيحة');
    }

  }
  ////////////////////////////// end login ///////////////


  ////////////////////////////// start resetPassword ///////////////


  public function resetPassword(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'phone'             =>'required',

    ]);

    if($validator->fails())
    {
      return responseJeson(0, $validator->errors()->first(), $validator->errors());
    }
    $client = Client::where('phone',$request->phone)->first();

    if($client)
    {
      $code = rand(1111,9999);
      $update = $client->update(['pin_code' => $code]);

      if($update)
      {
        Mail::to($client->email)
          ->bcc("abdalah.learn@gmail.com")
          ->send(new ResetPassword($client));

        return responseJeson(1, 'برجاء فحص الحساب', ['pin_code_for_reset' => $code]);
      }

      else
      {
        return responseJeson(0, 'حدث خطأ حاول مرة أخرى');
      }

    }

    else
    {
      return responseJeson(0, 'لايوجد حساب لهذا الرقم');
    }

  }


  ////////////////////////////// end resetPassword ///////////////

  ////////////////////////////// start newPassword ///////////////


  public function newPassword(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'pin_code'                 =>'required',
      'password'             =>'required|confirmed',

    ]);

    if($validator->fails())
    {
      return responseJeson(0, $validator->errors()->first(), $validator->errors());
    }

    $client = Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->first();
  //dd($client);
    if($client)
    {

      $client->password = bcrypt($request->password);
      $client->pin_code = null;

      if($client->save())
      {
        return responseJeson(1, 'تم تغيير كلمة المرور بنجاح');
      }

      else
      {
        return responseJeson(0, 'حدث خطأ حاول مرة أخرى');
      }
    }

    else
    {
      return responseJeson(0, 'هذا الكود غير صالح');
    }

  }


  ////////////////////////////// end newPassword ///////////////

  ////////////////////////////// start profile ///////////////

  public function profile(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'email' => 'unique:clients,email,'.$request->user()->id
    ]);

    if($validator->fails())
    {
      return responseJeson(0, $validator->errors()->first(), $validator->errors());
    }


    $profile = $request->user();
    $profile->update($request->all());
    return responseJeson(1,'success',$profile);
  }

  ////////////////////////////// end profile ///////////////


  ////////////////////////////// start updateNotificationSettings ///////////////

  public function updateNotificationSettings (Request $request)
  {
    $validator = validator()->make($request->all(), [

      'blood_types'               =>'array',
      'blood_types.*'             =>'exists:blood_types,id',
      'governorates'              =>'array',
      'governorates.*'            =>'exists:governorates,id',

    ]);

    if($validator->fails())
    {
      return responseJeson(0, $validator->errors()->first(), $validator->errors());
    }
    $request->user()->bloods()->sync($request->blood_types);
    $request->user()->governorates()->sync($request->governorates);

    return responseJeson(1,'success');
  }

  ////////////////////////////// end updateNotificationSettings ///////////////



  ////////////////////////////// start getNotificationSettings ///////////////


  public function getNotificationSettings (Request $request)
  {

    $data = [
      'blood_types' => $request->user()->bloods()->pluck('blood_types.id')->toArray(),
      'governorates' => $request->user()->governorates()->pluck('governorates.id')->toArray(),
    ];
    return responseJeson(1,'success',$data);
  }

  ////////////////////////////// end getNotificationSettings ///////////////


  ////////////////////////////// start registerToken ///////////////

  public function registerToken(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'token'             =>'required',
      'type'             =>'required|in:android,ios'

    ]);

    if($validator->fails())
    {
      return responseJeson(0, $validator->errors()->first(), $validator->errors());
    }

    Token::where('token',$request->token)->delete();
    $request->user()->tokens()->create($request->all());
    return responseJeson(1,'تم تسجيل الجهاز بنجاح');
  }

  ////////////////////////////// end registerToken ///////////////


  ////////////////////////////// start removeToken ///////////////

  public function removeToken(Request $request)
  {
    $validator = validator()->make($request->all(), [

    'token'             =>'required',

  ]);

  if($validator->fails())
  {
    return responseJeson(0, $validator->errors()->first(), $validator->errors());
  }

  Token::where('token',$request->token)->delete();
  return responseJeson(1,'تم الحذف بنجاح');
  }

  ////////////////////////////// end removeToken ///////////////



}
