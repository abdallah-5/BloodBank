<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blood Bank</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>



  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Blood Bank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url(route('home'))}}" class="d-block">Abdallah</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
             @inject('user','App\User')
             @inject('request','Illuminate\Http\Request')
             <a href="{{url(route('change-password.edit',$request->user()->id))}}" class="nav-link">
               <i class="nav-icon fas fa-edit"></i>
               <p>Change password</p>
             </a>
           </li>

           <li class="nav-item">
             <a href="{{url(route('client.index'))}}" class="nav-link">
               <i class="nav-icon fas fa-list"></i>
               <p>Clients</p>
             </a>
           </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url(route('category.index'))}}" class="nav-link">
                  <p>categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url(route('post.index'))}}" class="nav-link">
                  <p>posts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url(route('donation.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Donations</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('governorate.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Governorates</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('city.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Cities</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('contact.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Contacts</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('user.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Users</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('role.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Roles</p>
            </a>
          </li>


          <li class="nav-item">

            @inject('settings','App\Setting')

            <a href="{{url(route('setting.edit',$settings->first()->id))}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('page_title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              
              <li class="breadcrumb-item">
                 <div class="row">
                  {!! Form::open([

                    'route' => 'logout',
                    'method'=> 'post'

                    ]) !!}

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Logout</button>
                    </div>

                 {!! Form::close() !!}


                </div>
              </li>
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">@yield('page_title')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/js/demo.js')}}"></script>
@stack('scripts')
</body>
</html>
