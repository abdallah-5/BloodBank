@extends('layouts.app')
@section('page_title')
  Edit Role
@endsection

@section('content')


<!-- Main content -->

<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">  Edit Roles </h3>

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

        'action' => ['RoleController@update', $model->id],
        'method' => 'put'

        ]) !!}

        <div class="form-group">
          <label>Name</label>
          {!! Form::text('name',null,[
            'class' => 'form-control'
          ]) !!}

        </div>
        <div class="form-group">
          <label>Display name</label>
          {!! Form::text('display_name',null,[
            'class' => 'form-control'
          ]) !!}

        </div>
        <div class="form-group">
          <label>Description</label>
          {!! Form::textarea('description',null,[
            'class' => 'form-control'
          ]) !!}

        </div>
        <div class="form-group">
          @inject('perm','App\Permission')
          <label>Permissions</label>
          <div class="row">
            @foreach ($perm->all() as $permission)
              <div class="col-sm-3">
                <div class="checkbox">
                  <label>
                      <input type="checkbox" name = "permissions_list[]" value="{{$permission->id}}"

                            @if ($model->hasPermission($permission->name))
                                checked
                            @endif
                            >
                            {{$permission->display_name}}
                  </label>

                </div>

              </div>
            @endforeach

          </div>

        </div>
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
