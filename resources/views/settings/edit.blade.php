@extends('layouts.app')

@section('page_title')
  Edit Settings
@endsection

@section('content')


<!-- Main content -->

<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Settings</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      @include('flash::message')

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

        'action' => ['SettingController@update', $model->id],
        'method' => 'put'

        ]) !!}

        <div class="form-group">
          <label>Notification settings text</label>
          {!! Form::textarea('notification_settings_text',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>About us</label>
          {!! Form::textarea('about_us',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>phone</label>
          {!! Form::text('phone',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>Email</label>
          {!! Form::text('email',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>Fb_link</label>
          {!! Form::text('fb_link',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>Tw_link</label>
          {!! Form::text('tw_link',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>Youtube_link</label>
          {!! Form::text('youtube_link',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>Inst_link</label>
          {!! Form::text('inst_link',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>Whatsapp_link</label>
          {!! Form::text('whatsapp_link',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>Google_plus_link</label>
          {!! Form::text('google_plus_link',null,[
            'class' => 'form-control'
          ]) !!}

        </div>

        <div class="form-group">
          <label>Fax</label>
          {!! Form::text('fax',null,[
            'class' => 'form-control'
          ]) !!}

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
