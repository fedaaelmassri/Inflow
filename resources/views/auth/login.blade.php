<!doctype html>
<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
<?php
 $textdir='';
 if(App::getLocale() == 'en'){
    $textdir = 'ltr';
}elseif (App::getLocale() == 'ar')
$textdir = 'rtl';
?>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="<?php echo $textdir; ?>">

<head>
    <title> Oculux | دخول</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/animate-css/vivify.min.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/site.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <style>
        .img-fluid {
            max-width: 100%;
            height: 100%;
        }

        .btnn-round {
            border-radius: 50px;
            padding-left: 12px;
            padding-right: 12px
        }

        .btn-purple {
            color: #fff;
            background-color: rgb(151, 52, 144);
            border-color: rgb(151, 52, 144);
        }
    </style>


</head>



@if(App::getLocale() == 'ar')

<body class="theme-cyan light_version rtl">
    @else

    <body class="theme-cyan light_version ltr">
        @endif


        <!--<body class="theme-cyan rtl">-->
        {{--light_version--}}
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
                <div class="bar5"></div>
            </div>
        </div>

        @if (session('message'))
        <div class="alert alert-success">

            {{session('message')}}
        </div>
        @endif

        <div class="auth-main2 particles_js">
            <div class="auth_div vivify fadeInTop">
                <div class="card">
                    <div class="body">
                        <div class="login-img">
                            <img class="img-fluid" src="{{asset('assets/images/login-img.png')}}" />
                        </div>
                        <form method="POST" class="form-auth-small" action="{{ route('login') }}" id="basic-form"
                            novalidate>
                            @csrf

                            <div class="mb-3">
                                <p class="lead">{{trans('lang.Login')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only"> {{trans('lang.email')}}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="{{trans('lang.email')}}" value="{{ old('email') }}"
                                    required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">{{trans('lang.password')}}
                                </label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="{{trans('lang.password')}} " required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>
                                    <span>{{trans('lang.remember')}} </span>
                                </label>
                            </div>
                            <button type="submit"
                                class="btn btn-primary btn-round btn-block">{{trans('lang.Login')}}</button>
                            <div class="mt-4">

                                @if (Route::has('password.request'))
                                <span class="helper-text text-center m-b-10">
                                    <a href="{{route('password.request')}}">{{trans("lang.Forgot Your Password?")}}
                                    </a></span>



                                @endif


                                <span class="text-center helper-text">{{trans("lang.Don't have an account?")}}
                                    {{trans('lang.Register')}} </span>


                                <div class="form-group clearfix text-center">
                                    <a href="{{ route('register') }}" class="btn btn-sm btn-purple btnn-round "
                                        title="">{{trans('lang.sign_up_influencer')}}</a>
                                    <a href="{{route('company-signup')}}" class="btn btn-sm  btn-info  btnn-round "
                                        title="Themeforest"> {{trans('lang.sign_up_company')}}</a>
                                </div>
                                <div class="text-center helper-text mt-4">



                                    <div class="dropdown show">
                                        <?php
                $lang = '';
                if(App::getLocale() == 'en'){
                    $lang =  trans('lang.english') ;
                }elseif (App::getLocale() == 'ar')
                    $lang =  trans('lang.arabic');
                ?>
                                        @if(App::getLocale() == 'en')

                                        <a class="icone_cuscolor dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <img class="img-responsive" src="{{asset('/assets/images/en.jpg')}}">&nbsp;
                                            {{$lang}}


                                        </a>
                                        @endif
                                        @if(App::getLocale() == 'ar')

                                        <a class="icone_cuscolor dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <img class="img-responsive" src="{{asset('/assets/images/ar.jpg')}}">&nbsp;
                                            {{$lang}}


                                        </a>

                                        @endif


                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            <a class="dropdown-item" href="{{ url('change/en') }}"> <img
                                                    class="img-responsive"
                                                    src="{{asset('/assets/images/en.jpg')}}">&nbsp;&nbsp;{{trans('lang.english')}}
                                            </a>
                                            <a class="dropdown-item" href="{{ url('change/ar') }}"> <img
                                                    class="img-responsive"
                                                    src="{{asset('/assets/images/ar.jpg')}}">&nbsp;&nbsp;{{trans('lang.arabic')}}
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                        <div class="pattern">
                            <span class="red"></span>
                            <span class="indigo"></span>
                            <span class="blue"></span>
                            <span class="green"></span>
                            <span class="orange"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="particles-js"></div>
        </div>
        <!-- END WRAPPER -->

        <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
        <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
        <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
        <!--<script src="{{asset('assets/vendor/jquery-validation/jquery.validate.js')}}"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.6/parsley.min.js"></script>
        {{--
        <script src="{{ asset('assets/js/app.js') }}"></script>--}}
        <script>


            $(function () {
                $('#basic-form').parsley();
            });
        </script>


    </body>

</html>