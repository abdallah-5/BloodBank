@extends('front.master')
@section('content')
  <div class="container">
      <!--Breadcrumb-->
      <nav class="my-5" aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('client-home')}}">الرئيسيه</a></li>
              <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
              <li class="mr-lg-auto py-md-2"><a class="btn bg" href="{{route('client-create-donation')}}">طلب تبرع</a></li>
          </ol>
      </nav>
  </div><!--End container-->
  <!--Donation-->
  <section class="donation">
      <h2 class="text-center"><span class="py-1">طلبات التبرع</span> </h2>
      <hr />
      <div class="donation-request py-5">
        <div class="container">
          {!! Form::open([
            'method' => 'get'
            ])!!}
            <div class="selection w-75 d-flex mx-auto my-4">

                    @inject('blood_types','App\BloodType')
                    {!! Form::select('blood_type_id', $blood_types->pluck('name','id')->toArray(),null, ['class' => 'custom-select','placeholder'=>'فصيلة الدم']) !!}

                    @inject('governorates','App\Governorate')
                    {!! Form::select('governorate_id', $governorates->pluck('name','id')->toArray(),null, ['class' => 'custom-select mx-md-3 mx-sm-1','placeholder'=>'المحافظة']) !!}

                    <div>
                      <button type="submit"> <i class="fas fa-search"></i>  </button>
                    </div>

            </div>
            {!! Form::close()!!}
            <!--End selection-->
            @foreach ($donations as $donation)

              <div class="req-item my-3">
                <div class="row">
                  <div class="col-md-9 col-sm-12 clearfix">
                    <div class="blood-type m-1 float-right">
                      <h3>{{$donation->blood_type->name}}</h3>
                    </div>
                    <div class="mx-3 float-right pt-md-2">
                      <p>

                         اسم الحالة : {{$donation->patient_name}}
                      </p>
                      <p>
                         المستشفى : {{$donation->hospital_name}}

                      </p>
                      <p>
                         المدينة : {{optional($donation->city)->name}}
                      </p>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 text-center p-sm-3 pt-md-5">
                    <a href="{{url(route('donation-details',$donation->id))}}" class="btn btn-light px-5 py-3">التفاصيل</a>
                  </div>
                </div>
              </div>
            @endforeach

            <!--End last req-item-->
        </div>
        <!--End container-->
      </div>
      <!--End Donation-request-->
  </section>
  <!--End Donation-->

@endsection
