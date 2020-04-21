@extends('front.master')
@section('content')
  <!-- Sign Up Start -->
  <section id="sign-up">
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

                {!! Form::password('password',[
                  'class' => 'form-control', 'placeholder'=>'Password'
                ]) !!}

                {!! Form::password('password_confirmation',[
                  'class' => 'form-control', 'placeholder'=>'Password_confirmation'
                ]) !!}


                {{ Form::date('dob', \Carbon\Carbon::now()->format('Y-m-d'),['class' => 'form-control', 'placeholder'=>'dob']) }}

                {{ Form::date('last_donation_date', \Carbon\Carbon::now()->format('Y-m-d'),['class' => 'form-control', 'placeholder'=>'Last donation date']) }}




                @inject('blood_types','App\BloodType')
                {!! Form::select('blood_type_id', $blood_types->pluck('name','id')->toArray(),null, ['class' => 'form-control','placeholder'=>'Blood Types']) !!}

                @inject('governorates','App\Governorate')
                {!! Form::select('governorate_id', $governorates->pluck('name','id')->toArray(),null, ['class' => 'form-control','id'=>'$governorates','placeholder'=>'Governorates']) !!}

                {!! Form::select('city_id',[],null, ['class' => 'form-control','id'=>'cities','placeholder'=>'Cities']) !!}

                <div class="form-group">
                  <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

              {!! Form::close() !!}



      </div>
  </section>
  <!-- Sign Up End -->

  @push('scripts')

    <script>
      //if governorates changed
      $("#governorates").change(function (e){
        e.preventDefault();

        // get gov
        $governorate_id = $("#governorates").val();

        if(governorate_id)
        {
          $.ajax({

            url      : '{{url('api/v1/cities?governorate_id')}}'+governorate_id,
            type     : 'get',
            success  : function (data) {
              if(data.status == 1)
              {
                $("#cities").empty();
                //$("#cities").append('<option ></option>');
                $each(data.data, function(index,city){
                  $("#cities").append('<option value="'+city.id+'">'+city.name+'</option>');
                });
              }
            },
            error : function (jqXhr, textStatus, errorMessage){
              alert(errorMessage);
            }

          });

        }

        else
        {
          $("#cities").empty();

        }

      });

    </script>

  @endpush

@endsection
