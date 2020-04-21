

    @extends('front.master')
    @section('content')
      <!-- Navigator Start -->
      <section id="navigator">
          <div class="container">
              <div class="path">
                  <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                  <div class="path-directio" style="color: grey; display:inline-block;"> / Contact Us</div>
              </div>

          </div>
      </section>
      <!-- Navigator End -->

      <!-- login Start -->
      <section id="contact">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 call">
                      <div class="title">Head</div>
                      <img src="{{asset('front/imgs/logo.png')}}" alt="">
                      <hr>
                      @inject('setting','App\SETTING')
                      <h4>Mobile: {{$setting->first()->phone}}</h3>
                          <h4>Fax: {{$setting->first()->fax}}</h3>
                              <h4>Email: {{$setting->first()->email}}</h3>
                                  <hr>
                                  <h3>Find Us On</h3>
                                  <div class="icons">

                                    <a href="{{$setting->first()->fb_link}}">
                                      <i class="fab fa-facebook-square fa-3x"></i>
                                    </a>

                                    <a href="{{$setting->first()->google_plus_link}}">
                                      <i class="fab fa-google-plus-square fa-3x"></i>
                                    </a>

                                    <a href="{{$setting->first()->tw_link}}">
                                      <i class="fab fa-twitter-square fa-3x"></i>
                                    </a>

                                    <a href="{{$setting->first()->whatsapp_link}}">
                                      <i class="fab fa-whatsapp-square fa-3x"></i>
                                    </a>

                                    <a href="{{$setting->first()->youtube_link}}">
                                      <i class="fab fa-youtube-square fa-3x"></i>
                                    </a>


                                  </div>
                  </div>
                  <div class="col-md-6 info">
                      <div class="title">Head</div>

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

                        'route' => 'client-registerSave'

                        ]) !!}

                        {!! Form::text('name',null,[
                          'class' => 'form-control', 'placeholder'=>'Name'
                        ]) !!}

                        {!! Form::text('email',null,[
                          'class' => 'form-control', 'placeholder'=>'Email'
                        ]) !!}


                        {!! Form::text('phone',null,[
                          'class' => 'form-control', 'placeholder'=>'Phone'
                        ]) !!}

                        {!! Form::text('subject',null,[
                          'class' => 'form-control', 'placeholder'=>'Title'
                        ]) !!}
                        {!! Form::textarea('message',null,[
                          'class' => 'form-control', 'placeholder'=>'Message'
                        ]) !!}

                        <div class="form-group reg-group">
                          <button type="submit" class="btn btn-primary"> Send </button>
                        </div>

                      {!! Form::close() !!}


                  </div>
              </div>
          </div>
      </section>
      <!-- login End -->
    @endsection
