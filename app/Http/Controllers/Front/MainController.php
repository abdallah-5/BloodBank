<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\DonationRequest;
use App\Contact;

class MainController extends Controller
{
    public function home(Request $request)
    {
      $posts = Post::take(9)->get();

      $donations = DonationRequest::where(function($q) use( $request){

        if($request->blood_type_id)
        {
          $q->where('blood_type_id', $request->blood_type_id);
        }

        if($request->governorate_id)
        {
          $q->whereHas('city', function ($q2) use($request)
          {

              $q2->where('governorate_id',$request->governorate_id);

          });
        }
      })->get();
      return view('front.home',compact('posts','donations'));

    }

    public function posts()
    {
      $posts = Post::take(9)->get();
      return view('front.posts',compact('posts'));
    }
    public function post($id)
    {
      $post = Post::findOrFail($id);
      $posts = Post::where('$this->category_id','$post->category_id')->get();
      dd($posts);
      return view('front.post',compact('post','posts'));

    }

    public function donations(Request $request)
    {
      $donations = DonationRequest::where(function($q) use( $request){

        if($request->blood_type_id)
        {
          $q->where('blood_type_id', $request->blood_type_id);
        }

        if($request->governorate_id)
        {
          $q->whereHas('city', function ($q2) use($request)
          {

              $q2->where('governorate_id',$request->governorate_id);

          });
        }
      })->get();
      return view('front.requests',compact('donations'));

    }

    public function donationDetails($id)
    {
      $donation = DonationRequest::findOrFail($id);
      return view('front.request',compact('donation'));

    }

    public function aboutUs()
    {
      return view('front.about-us');

    }

    public function contactUs()
    {
      return view('front.contact-us');

    }

    public function contactUsMessage(Request $request)
    {
      $rules = [
        'name'              =>'required',
        'email'             =>'required|unique:clients',
        'phone'             =>'required',
        'subject'             =>'required',
        'message'             =>'required',
      ];

      $messages = [
        'name.required'    => 'name is required',
        'email.required'    => 'Email is required',
        'phone.required'    => 'phone is required',
        'subject.required'    => 'subject is required',
        'message.required'    => 'message is required',
      ];

      $this->validate($request, $rules, $messages);
      $client = Contact::create($request->all());
      return back();

    }


    public function favourite()
    {
      // dd(auth()->guard('client-web')->user()->id);
      $posts = auth()->guard('client-web')->user()->posts()->get();
      return view('front.favourite',compact('posts'));

    }

    public function createDonation()
    {

      return view('front.create-donation');

    }


    public function createDonationSave(Request $request)
    {

          //validation
        $rules = [
          'patient_name'         =>'required',
          'patient_age'          =>'required',
          'blood_type_id'        =>'required|exists:blood_types,id',
          'bags_num'             =>'required',
          'hospital_name'        =>'required',
          'hospital_address'     =>'required',
          'city_id'              =>'required|exists:cities,id',
          'phone'                =>'required',
          'notes'                =>'required',

        ];

        $messages = [
          'name.required' => 'Name is required'
        ];


        //create donationRequest
        $donationRequest = auth()->guard('client-web')->user()->requests()->create($request->all());


      return view('front.home');

    }


    // public function donator()
    // {
    //   return view('front.donator');
    //
    // }
    // public function requests()
    // {
    //   return view('front.requests');
    //
    // }
    // public function whoWeAre()
    // {
    //   return view('front.who-we-are');
    //
    // }
}
