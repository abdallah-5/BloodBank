@extends('front.master')
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Login</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Login Start -->
    <section id="login">
        <div class="container">
                <img src="{{asset('front/imgs/logo.png')}}" alt="">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open([

                  'route' => 'client-login-check'
                  ]) !!}

                {!! Form::text('email',null,[
                  'class' => 'form-control username', 'placeholder'=>'Email'
                ]) !!}

                {!! Form::password('password',[
                  'class' => 'form-control password', 'placeholder'=>'Password'
                ]) !!}

                <input class="check" type="checkbox">Remember me
                <a href="#">Forget Password ?</a><br>

                <div class="form-group reg-group">
                  <button type="submit" class="btn btn-primary"> Submit </button>
                  <a href="{{url(route('client-register'))}}">
                    <button class="btn signup" style="background-color: rgb(51, 58, 65);">Make new account</button>
                  </a>
                </div>

                {!! Form::close() !!}

        </div>
    </section>
    <!-- Login End -->

@stop
