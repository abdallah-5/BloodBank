@extends('front.master')
@section('content')

<div class="container">
<br>
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

    'route' => 'client-create-donation-save'

    ]) !!}

    <div class="form-group">
      {!! Form::text('patient_name',null,[
      'class' => 'form-control', 'placeholder'=>'اسم المريض'
      ]) !!}
    </div>

    <div class="form-group">
      {!! Form::text('patient_age',null,[
      'class' => 'form-control', 'placeholder'=>'عمر المريض'
      ]) !!}
    </div>

    <div class="form-group">
      {!! Form::text('phone',null,[
      'class' => 'form-control', 'placeholder'=>'الهاتف'
      ]) !!}
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
      {!! Form::text('bags_num',null,[
      'class' => 'form-control', 'placeholder'=>'عدد الاكياس المطلوبة'
      ]) !!}
    </div>

    <div class="form-group">
      {!! Form::text('hospital_name',null,[
      'class' => 'form-control', 'placeholder'=>'اسم المستشفى'
      ]) !!}
    </div>

    <div class="form-group">
      {!! Form::text('hospital_address',null,[
      'class' => 'form-control', 'placeholder'=>'عنوان المستشفى'
      ]) !!}
    </div>

    <div class="form-group">
      {!! Form::textarea('notes',null,[
      'class' => 'form-control', 'placeholder'=>'ملاحظات'
      ]) !!}
    </div>


    <div class="form-group">
      <button type="submit" class="btn btn-primary"> تسجيل </button>
    </div>

    {!! Form::close() !!}



</div>


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
