
@extends('layouts.app')
@section('page_title')
  Change password
@endsection

@section('content')


<!-- Main content -->

<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Change password</h3>

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

        'action' => ['ChangePasswordController@update', $model->id],
        'method' => 'put'

        ]) !!}

        <div class="form-group">
          <label>Old_password</label>
          {!!
            Form::password('old_password', ['class' => 'awesome'])
          !!}

        </div>

        <div class="form-group">
          <label>New_password</label>
          {!!
            Form::password('password', ['class' => 'awesome'])
          !!}

        </div>

        <div class="form-group">
          <label>New_password_confirmation</label>
          {!!
            Form::password('password_confirmation', ['class' => 'awesome'])
          !!}

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
