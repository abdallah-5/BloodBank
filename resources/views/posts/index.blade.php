@extends('layouts.app')

@section('page_title')
  Post
@endsection

@section('content')


<!-- Main content -->

<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List of Posts</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <a href="{{url(route('post.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Post</a>
      <br>
      @include('flash::message')
      @if(count($records))
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Title</th>
                <th class="text-center">Content</th>
                <th class="text-center">Image</th>
                <th class="text-center">Category</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($records as $record)
                <tr>
                  <td class="text-center">{{$loop->iteration}}</td>
                  <td class="text-center">{{$record->title}}</td>
                  <td class="text-center">{{$record->content}}</td>
                  <td class="text-center"><img src="{{asset($record->image)}}" height="50px" width="50p"></td>
                  <td class="text-center">{{optional($record->category)->name}}</td>
                  <td class="text-center">
                    <a href="{{url(route('post.edit',$record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                  </td>
                  <td class="text-center">
                    {!! Form::open([
                        'action' => ['PostController@destroy',$record->id],
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
