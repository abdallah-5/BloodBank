@extends('layouts.app')

@section('page_title')
  Clients
@endsection

@section('content')


<!-- Main content -->

<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List of Clients</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      @include('flash::message')
      @if(count($records))
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Email</th>
                <th class="text-center">Active || Deactive</th>
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($records as $record)
                <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td class="text-center">{{$record->name}}</td>
                  <td class="text-center">{{$record->phone}}</td>
                  <td class="text-center">{{$record->email}}</td>
                  <td class="text-center">
                     @if($record->is_activated)
                         <a href="{{url(route('clients.deactivate',$record->id))}}"
                            class="btn btn-danger btn-xs">إلغاء
                             التفعيل</a>
                     @else
                         <a href="{{url(route('clients.activate',$record->id))}}"
                            class="btn btn-success btn-xs">تفعيل</a>
                     @endif
                 </td>
                  <td class="text-center">
                    {!! Form::open([
                        'action' => ['ClientController@destroy',$record->id],
                        'method' => 'delete'
                      ]) !!}
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}

                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>

        </div>

      @else
      <div class="alert alert-danger" role="alert">
          No Data
      </div>
      @endif

    </div>
    <!-- /.card-body -->

  </div>
  <!-- /.card -->

</section>
<!-- /.content -->


@endsection
