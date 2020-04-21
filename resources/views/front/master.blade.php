@inject('setting','App\SETTING')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap file css-->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <!--Plugins file css-->
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery-nao-calendar.css')}}">
    <!--google-font-->
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&display=swap" rel="stylesheet">
    <!--main file css-->
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <title>بنك الدم</title>
</head>

<body>
    <!--Loading Page-->
    <div class="loading-page">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <!--header section-->
    <section class="header">
        <!--top-bar-->
        <div class="top-bar py-2">
            <div class="container">
                <!--row of top-bar-->
                <div class="d-flex justify-content-between">
                      
                    <div>
                        <ul class="list-unstyled">
                            <li class="d-inline-block mx-2"><a class="facebook" href="{{$setting->first()->fb_link}}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li class="d-inline-block mx-2"><a class="insta" href="{{$setting->first()->inst_link}}"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li class="d-inline-block mx-2"><a class="twitter" href="{{$setting->first()->tw_link}}"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li class="d-inline-block mx-2">
                              <a class="whatsapp" href="https://api.whatsapp.com/send?phone={{$setting->first()->whatsapp_link}}">
                                <i class="fab fa-whatsapp"></i>
                              </a>
                            </li>
                        </ul>
                    </div>
                    @if(auth()->guard('client-web')->check())
                      <div class="connect">
                          <div class="dropdown">
                              <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                  aria-haspopup="true" aria-expanded="false">
                                  <span> مرحبا بك </span> {{optional(auth()->guard('client-web')->user())->name}} &nbsp; &nbsp;
                              </a>
                              <div class="dropdown-menu text-right" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{route('client-home')}}"> <i class="fas fa-home ml-2"></i>الرئيسيه</a>
                                  <a class="dropdown-item" href="{{url(route('client-profile'))}}"> <i class="fas fa-user-alt ml-2"></i>معلوماتى</a>
                                  <a class="dropdown-item" href="{{url(route('client-notification-setting'))}}"> <i class="fas fa-bell ml-2"></i>اعدادات الاشعارات</a>
                                  <a class="dropdown-item" href="{{url(route('client-favourite'))}}"> <i class="far fa-heart ml-2"></i>المفضلة</a>
                                  <a class="dropdown-item" href="{{route('client-contact-us')}}"> <i class="fas fa-phone ml-2"></i>تواصل
                                      معنا</a>
                                  <a class="dropdown-item" href="{{url(route('client-logout'))}}"> <i class="fas fa-sign-out-alt ml-2"></i>خروج</a>
                              </div>
                          </div>
                      </div>
                    @endif
                </div>
                <!--End row-->
            </div>
            <!--End container-->
        </div>
        <!--End top-bar-->
        <!--navbar-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{asset('front/imgs/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('client-home')}}">الرئيسيه <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client-about-us')}}">عن بنك الدم</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('posts')}}">المقالات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('donations')}}">طلبات التبرع</a>
                        </li>

                        <li class="nav-item cont">
                            <a class="nav-link" href="{{route('client-contact-us')}}">اتصل بنا</a>
                        </li>
                        @if(auth()->guard('client-web')->check())
                          <li class="mr-lg-auto"><a class="signin" href="{{url(route('client-logout'))}}">تسجيل خروج</a></li>
                        @else
                          <li class="mr-lg-auto"><a class="signin" href="{{url(route('client-register'))}}">انشاء حساب جديد</a></li>
                          <li class="pr-3"><a class="btn bg" href="{{url(route('client-login'))}}">الدخول</a></li>

                        @endif
                    </ul>
                </div>
            </div>
            <!--End container-->
        </nav>
        <!--End Nav-->


    @yield('content')

    <!--Footer-->
    <footer>
        <div class="main-footer py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4  offset-1">
                        <img src="{{asset('front/imgs/logo.png')}}" alt="">
                        <h5 class="my-3">بنك الدم</h5>
                        <p class="pl-4"> هذا النص هو مثال لنص ممكن أن يستبدل فى نفس المساحه, لقد تم توليد
                            هذا النص من مولد النص العرب حيث يمكنك ان تولد هذا النص أو
                            العديد من النصوص الأخرى وإضافة الى زيادة عدد الحروف التى يولدها التطبيق يطلع على صورة حقيقة
                            لتطبيق
                            الموقع
                        </p>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li class="py-2"><a href="{{route('client-home')}}">الرئيسية </a></li>
                            <li class="py-2"><a href="{{route('client-about-us')}}">عن بنك الدم</a></li>
                            <li class="py-2"><a href="{{route('posts')}}">المقالات</a></li>
                            <li class="py-2"><a href="{{route('donations')}}">عن التبرع</a></li>
                            <li class="py-2"><a href="{{route('client-contact-us')}}">اتصل بنا</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 available">
                        <h6 class="mb-5">متوفر على</h6>
                        <div class="my-3"><img src="{{asset('front/imgs/google1.png')}}" alt=""></div>
                        <div class="my-3"><img src="{{asset('front/imgs/ios1.png')}}" alt=""></div>
                    </div>
                </div>
            </div>
            <!--End container-->
        </div>
        <!--End main-footer-->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <li class="d-inline-block mx-2"><a class="facebook" href="{{$setting->first()->fb_link}}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li class="d-inline-block mx-2"><a class="insta" href="{{$setting->first()->inst_link}}"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li class="d-inline-block mx-2"><a class="twitter" href="{{$setting->first()->tw_link}}"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li class="d-inline-block mx-2"><a class="whatsapp" href="https://api.whatsapp.com/send?phone={{$setting->first()->whatsapp_link}}"><i
                                        class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p class="text-center">جميع الحقوق محفوظه لـ <span>بنك الدم</span> &copy; 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Footer-->
    <!--scrollUp-->
    <div class="scrollUp">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--jquery/bootstrap/main file js-->
    <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front/js/slick.min.js')}}"></script>
    <script src="{{asset('front/js/jquery-nao-calendar.js')}}"></script>
    <script src="{{asset('front/js/popper.min.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>





    @stack('scripts');

</body>

</html>
