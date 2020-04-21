@extends('front.master')
@section('content')

<div class="">
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

    'route' => 'client-notification-setting-update'

    ]) !!}



  <div class="form-group">

    <h4>فصائل الدم</h4>

    <input id="select-all" type="checkbox"><label for='select-all'>اختر الكل</label>

      @foreach ($blood_types as $key => $value)

      <div class="checkbox">
        <input type="checkbox" class="form-check-input blood_type" value="{{$value}}" name= "blood_types[]">
        <label class="form-check-label" >{{$key}}</label>
      </div>

      @endforeach


  </div>

  <div class="form-group">

    <h4>المحافظات</h4>

    <input id="select-all" type="checkbox"><label for='select-all'>اختر الكل</label>

      @foreach ($governorates as $key => $value)

      <div class="checkbox">
        <input type="checkbox" class="form-check-input governorate" value="{{$value}}" name= "governorates[]">
        <label class="form-check-label" >{{$key}}</label>
      </div>

      @endforeach


  </div>







  <div class="form-group">
    <button type="submit" class="btn btn-primary"> Submit </button>
  </div>
  {!! Form::close() !!}
</div>
@push('scripts')
      <script>
        $("#selectAll").click(function() {
          $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });
        $("#select-all").click(function() {
          $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });


      </script>
@endpush
@endsection
