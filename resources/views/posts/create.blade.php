@extends('layouts.app')
@inject('model','App\Post')
@section('page_title')
  Create Post
@endsection

@section('content')


<!-- Main content -->

<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Create Posts</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      {!! Form::model($model,[

        'action' => 'PostController@store',
        'files' => 'true'

        ]) !!}

        <div class="form-group">

          <label>title</label>
          {!! Form::text('title',null,[
            'class' => 'form-control'
          ]) !!}
        </div>

        <div class="form-group">
          <label>image</label>
          {!! Form::file('image',null,[
            'class' => 'form-control'
          ]) !!}
        </div>

        <div class="form-group">
          <label>content</label>
          {!! Form::textarea('content',null,[
            'class' => 'form-control'
          ]) !!}
        </div>

        <div class="form-group">
          @inject('categories','App\Category')
          {!! Form::Label('category', 'Category :') !!}
          {!! Form::select('category_id', $categories->pluck('name','id')->toArray(), ['class' => 'form-control']) !!}
        </div>
        <br>

        <div class="form-group">
          <button type="submit" class="btn btn-primary"> Submit </button>
        </div>

        {!! Form::close() !!}
    </div>
    <!-- /.card-body -->

  </div>
  <!-- /.card -->

</section>
<!-- /.content -->


@endsection
