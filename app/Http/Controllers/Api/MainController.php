<?php


namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Governorate;
use App\City;
use App\Post;
use App\Token;
use App\BloodType;
use App\Category;
use App\Contact;
use App\Setting;
use App\DonationRequest;

class MainController extends Controller
{

    ////////////////////////////// start bloodTypes///////////////
     public function bloodTypes()
    {
      $blood_types = BloodType::all();
      return responseJeson(1,'success',$blood_types);
    }
    ////////////////////////////// end bloodTypes///////////////
//
//
    ////////////////////////////// start governorates///////////////
     public function governorates()
    {
      $governorates = Governorate::all();
      return responseJeson(1,'success',$governorates);
    }
    ////////////////////////////// end governorates///////////////

    ////////////////////////////// start cities///////////////
    public function cities(Request $request)
   {
     $cities = City::where(function($q) use( $request){

       if($request->has('governorate_id'))
       {
         $q->where('governorate_id', $request->governorate_id);
       }
     })->get();
     return responseJeson(1,'success',$cities);
   }
   ////////////////////////////// end cities///////////////


   ////////////////////////////// start posts and post ///////////////
   public function posts(Request $request)
   {
    $posts = Post::where(function($q) use( $request){

      if($request->has('category_id'))
      {
        $q->where('category_id', $request->category_id);
      }

      if($request->has('keyword'))
      {
        $q->where(function($q) use( $request){
            $q->where('title','LIKE', '%'. $request->keyword .'%')
            ->orWhere('content','LIKE', '%'. $request->keyword .'%');

          });

    }
    })->get();
    return responseJeson(1,'success',$posts);
  }

  public function post(Request $request)
 {
   $validator = validator()->make($request->all(), [

     'post_id'            =>'required|exists:posts,id'

   ]);

   if($validator->fails())
   {
     return responseJeson(0, $validator->errors()->first(), $validator->errors());
   }
   $post = Post::where('id', $request->post_id)->get();
   return responseJeson(1,'success',$post);
 }
 ////////////////////////////// end posts and post ///////////////

 ////////////////////////////// start toggleFavourite ///////////////
 public function toggleFavourite(Request $request)
 {
   $validator = validator()->make($request->all(), [

     'post_id'            =>'required|exists:posts,id'

   ]);

   if($validator->fails())
   {
     return responseJeson(0, $validator->errors()->first(), $validator->errors());
   }

  $post = $request->user()->posts()->toggle($request->post_id);
   //$post_id = $request->post_id;
   return responseJeson(1, 'success', $post);

 }

 ////////////////////////////// end toggleFavourite ///////////////


 ////////////////////////////// start listFavourites ///////////////

 public function listFavourites(Request $request)
 {

   $listFavourites = $request->user()->posts()->get();
   return responseJeson(1, 'success', $listFavourites);

 }

 ////////////////////////////// end listFavourites ///////////////



 ////////////////////////////// start donationRequestCreate ///////////////
 public function donationRequestCreate(Request $request)
 {
   //validation
   $validator = validator()->make($request->all(), [

     'patient_name'         =>'required',
     'patient_age'          =>'required',
     'blood_type_id'        =>'required|exists:blood_types,id',
     'bags_num'             =>'required',
     'hospital_name'        =>'required',
     'hospital_address'     =>'required',
     'latitude'             =>'required',
     'longitude'            =>'required',
     'city_id'              =>'required|exists:cities,id',
     'phone'                =>'required',
     'notes'                =>'required',

   ]);

   if($validator->fails())
   {
     return responseJeson(0, $validator->errors()->first(), $validator->errors());
   }


   //create donationRequest
   $donationRequest = $request->user()->requests()->create($request->all());

   //find clients suitable for this donation request
   $clientsIds = $donationRequest->city->governorate->clients()
     ->whereHas('bloods',function ($q) use($request)
     {
       $q->where('blood_types.id',$request->blood_type_id);
     })->pluck('clients.id')->toArray();

     if (count($clientsIds))
     {
       //create a notification on database
       $notification = $donationRequest->notifications()->create(
         [
           'title'=>'يوجد حالة تبرع قريبة منك',
           'content'=>optional($donationRequest->blood_type)->name . 'محتاج تبرع لفصيلة'
         ]
       );

       // attach clients to this notification
       $notification->clients()->attach($clientsIds);
     }

     // get tokens
     $tokens = Token::whereIn('client_id',$clientsIds)->where('token','!=', null)->pluck('token')->toArray();
    //dd($tokens);
     if (count($tokens))
     {
       $title = $notification->title;
       $body = $notification->content;
       $data =[
         'donation_request_id'=> $donationRequest->id
       ];
       $send = notifyByFirebase($title,$body,$tokens,$data);
       dd($send);
     }

     return responseJeson(1, 'success', $donationRequest);


 }

 ////////////////////////////// end donationRequestCreate ///////////////




//  ////////////////////////////// start donations ///////////////

public function donations(Request $request)
{
 $donations = DonationRequest::where(function($q) use( $request){

   if($request->has('blood_type_id'))
   {
     $q->where('blood_type_id', $request->blood_type_id);
   }

   if($request->has('city_id'))
   {
     $q->where('city_id', $request->city_id);
   }
 })->get();
 return responseJeson(1,'success',$donations);
}


//  ////////////////////////////// end donations ///////////////


 ////////////////////////////// start donation ///////////////

 public function donation(Request $request)
{
  $validator = validator()->make($request->all(), [

    'donation_id'            =>'required|exists:donation_requests,id'

  ]);

  if($validator->fails())
  {
    return responseJeson(0, $validator->errors()->first(), $validator->errors());
  }
  $donation = DonationRequest::where('id', $request->donation_id)->get();
  //$request->user()->contacts()->update('is_read' => 1);
  return responseJeson(1,'success',$donation);
}
 ////////////////////////////// end donation ///////////////

//
 ////////////////////////////// start categories ///////////////

 public function categories()
 {

  $categories = Category::all();
  return responseJeson(1,'success',$categories);
 }

 ////////////////////////////// end categories ///////////////

 ////////////////////////////// start settings ///////////////

 public function settings()
 {
  $settings = Setting::all();
  return responseJeson(1,'success',$settings);
 }

 ////////////////////////////// end settings ///////////////


  ////////////////////////////// start contactus ///////////////

  public function contactus(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'name'              =>'required',
      'phone'             =>'required',
      'email'             =>'required|unique:clients',
      'subject'           =>'required',
      'message'           =>'required',

      ]);

    if($validator->fails())
    {
      return responseJeson(0, $validator->errors()->first(), $validator->errors());
    }
    $request->user()->contacts()->create($request->all());
    return responseJeson(1, 'success');
  }

  ////////////////////////////// end contactus ///////////////

  ////////////////////////////// start notifications ///////////////

  public function notifications(Request $request)
  {

    $notifications = $request->user()->notifications()->get();

    foreach ($notifications as $notification)
    {

      $notification->clients()->updateExistingPivot($notifications, ['is_read' => 1], false);
    }

    return responseJeson(1, 'success', $notifications);


  }

  //////////////////////////// end notifications ///////////////

  ////////////////////////////// start notificationsCounter ///////////////

  public function notificationsCounter(Request $request)
  {

    $counter = $request->user()->notifications()->where('is_read',0)->count();

    return responseJeson(1, 'success', $counter);


  }

  ////////////////////////////// end notificationsCounter ///////////////


}
