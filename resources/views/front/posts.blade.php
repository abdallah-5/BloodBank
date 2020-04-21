@extends('front.master')
@section('content')

<section class="articles py-5">
    <div class="title">
        <div class="container">
            <h2><span class="py-1">المقالات</span> </h2>
        </div>
        <hr />
    </div>
    <div class="article-slide mt-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="arrow text-left">
                        <button type="button" class="prev-arrow px-2 py-1"><i
                                class="fas fa-chevron-right"></i></button>
                        <button type="button" class="next-arrow px-2 py-1"><i
                                class="fas fa-chevron-left"></i></button>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
    <!--End container-->
</section>


@endsection
