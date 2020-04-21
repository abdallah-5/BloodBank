@extends('front.master')
@section('content')

<div class="slick2">
  @foreach ($posts as $post)
    <div class="slick-cont">
        <div class="card">
            <img src="{{asset($post->image)}}" class="card-img-top" alt="slick-img" width="300px" height="220px">
            <div class="heart-icon"><i class="far fa-heart"></i></div>
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p>{{$post->content}}</p>
                <div class="text-center"><a href="{{url(route('post-details',$post->id))}}" class="btn bg px-5">التفاصيل</a>
                </div>
            </div>
        </div>
    </div>
  @endforeach
</div>



@endsection
