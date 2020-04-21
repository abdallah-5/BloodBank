@extends('front.master')
@section('content')
<div class="container">


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::model($client,[

  'action' => 'Front\AuthController@updateProfile',
  'method' => 'post'

  ]) !!}

    <div class="form-group">
      {!! Form::text('name',null,[
      'class' => 'form-control', 'placeholder'=>'الاسم'
      ]) !!}
    </div>

    <div class="form-group">
      {!! Form::text('email',null,[
      'class' => 'form-control', 'placeholder'=>'الايميل'
      ]) !!}

    </div>

    <div class="form-group">
      {!! Form::text('phone',null,[
      'class' => 'form-control', 'placeholder'=>'الهاتف'
      ]) !!}

    </div>

    <div class="form-group">
      {!! Form::password('password',[
      'class' => 'form-control', 'placeholder'=>'كلمة المرور'
      ]) !!}

    </div>

    <div class="form-group">
      {!! Form::password('password_confirmation',[
      'class' => 'form-control', 'placeholder'=>'تأكيد كلمة المرور'
      ]) !!}

    </div>

    <div class="form-group">
      {{ Form::date('dob', \Carbon\Carbon::now()->format('Y-m-d'),['class' => 'form-control', 'placeholder'=>'dob']) }}

    </div>

    <div class="form-group">
      {{ Form::date('last_donation_date', \Carbon\Carbon::now()->format('Y-m-d'),['class' => 'form-control', 'placeholder'=>'Last donation date']) }}

    </div>

    <div class="form-group">
      @inject('blood_types','App\BloodType')
      {!! Form::select('blood_type_id', $blood_types->pluck('name','id')->toArray(),null, ['class' => 'form-control','placeholder'=>'فصيلة الدم']) !!}

    </div>

    <div class="form-group">
      @inject('governorates','App\Governorate')
      {!! Form::select('governorate_id', $governorates->pluck('name','id')->toArray(),null, ['class' => 'form-control','id'=>'governorates','placeholder'=>'المحافظة']) !!}

    </div>

    <div class="form-group">
      {!! Form::select('city_id',[],null, ['class' => 'form-control','id'=>'cities','placeholder'=>'المدينة']) !!}

    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary"> تعديل </button>
    </div>

  {!! Form::close() !!}

  @push('scripts')

    <script>

      //if governorates changed
      $("#governorates").change(function (e){
        e.preventDefault();

        // get gov
        var governorate_id = $("#governorates").val();
        //console.log(g);
        if(governorate_id)
        {
          $.ajax({

            url      : '{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
            type     : 'get',
            success  : function (data) {
              if(data.status == 1)
              {
                  $("#cities").empty();
                  $("#cities").append('<option >المدينة</option>');
                $.each(data.data, function(index,city){
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

          $("#cities").append('<option >المدينة</option>');
        }

      });

    </script>

  @endpush


@endsection
