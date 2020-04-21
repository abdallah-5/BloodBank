@extends('layouts.app')

@section('page_title')
  Donation details
@endsection

@section('content')


<!-- Main content -->

<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Donation details</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      @include('flash::message')
        <div class="table-responsive">
          <table class="table table-bordered">

            <tr>
              <th class="text-center" width="40%">Patient name</th>
              <td class="text-center">{{$model->patient_name}}</td>
            </tr>

            <tr>
              <th class="text-center" >Phone</th>
              <td class="text-center">{{$model->phone}}</td>
            </tr>
            <tr>
              <th class="text-center">Patient age</th>
              <td class="text-center">{{$model->patient_age}}</td>
            </tr>
            <tr>
              <th class="text-center">Blood type</th>
              <td class="text-center">{{$model->blood_type->name}}</td>
            </tr>
            <tr>
              <th class="text-center">Bags num</th>
              <td class="text-center">{{$model->bags_num}}</td>
            </tr>

            <tr>
              <th class="text-center">Hospital name</th>
              <td class="text-center">{{$model->hospital_name}}</td>
            </tr>

            <tr>
              <th class="text-center">Hospital address</th>
              <td class="text-center">{{$model->hospital_address}}</td>
            </tr>

            <tr>
              <th class="text-center">City</th>
              <td class="text-center">{{$model->city->name}}</td>
            </tr>

            <tr>
              <th class="text-center">Notes</th>
              <td class="text-center">{{$model->notes}}</td>
            </tr>

            <tr>
              <th class="text-center">Donation's creator</th>
              <td class="text-center">{{$model->client->name}}</td>
            </tr>

          </table>

        </div>


    </div>
    <!-- /.card-body -->

  </div>
  <!-- /.card -->

</section>
<!-- /.content -->


@endsection
