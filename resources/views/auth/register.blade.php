<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title> Oculux | انشاء حساب</title>
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

.separator-linethrough span {

    background-color: white;

                  } 
                  .auth-main .auth_div{width:930px;z-index:999;display:flex;flex-wrap:wrap;justify-content:space-between;}   
    </style>
</head>

@if(App::getLocale() == 'ar')
<body class="theme-cyan light_version rtl">
@else
<body class="theme-cyan light_version ltr">
@endif

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

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>


<div class="auth-main particles_js">
    <div class="auth_div vivify popIn ">
        
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="{{asset('assets/images/icon.svg')}}" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Oculux</a>
        </div>

      







        <div class="card mt-4">
            <div class="body">
                <p class="lead">{{trans('lang.Register')}} </p>

                    <form method="POST" action="{{ route('register') }}" class="form-auth-small m-t-20">
                        @csrf
                <div class="form-row">
                    <div class="form-group col-md-2">                        
                    </div>
                    <div class="form-group col-md-4">                        
                          <input id="name" placeholder="{{trans('lang.name')}}" type="text" class="form-control  round @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">    

                    <input id="email"  placeholder ="{{trans('lang.email')}}" type="email" class="form-control   round @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
             </div>
            
        </div>
                 
        <div class="form-row">
            <div class="form-group col-md-2">                        
            </div>
            <div class="form-group col-md-4"> 
              <input id="password"  placeholder = "{{trans('lang.password')}} " type="password" class="form-control round @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
            <div class="form-group col-md-4"> 
                <input id="password-confirm" placeholder="{{trans('lang.Confirm-password')}}" type="password" class="form-control round" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">                        
            </div>
            <div class="form-group col-md-4"> 
          <button type="submit" class="btn btn-primary btn-round btn-block">{{trans('lang.Register')}} </button>
        </div>
        </div>
   
        <div class="separator-linethrough"><span>OR</span></div>
         <div class="form-row">
        <div class="form-group col-md-2">                        
        </div>
        <div class="form-group col-md-4">             
                <a href="{{route('snapchat.login')}}" class="btn btn-round btn-signin-social"><i class="fa fa-snapchat snapchat-color"></i> {{trans('lang.sign_up_facebook')}}</a>
            </div>
            <div class="form-group col-md-4">             

                <button class="btn btn-round btn-signin-social"><i class="fa fa-twitter twitter-color"></i> {{trans('lang.sign_up_twitter')}}</button>
            </div>
        </div>

            <div class="form-row">
                <div class="form-group col-md-2">                        
                </div>
                <div class="form-group col-md-4">   
                <a href="{{route('instagram.login')}}" class="btn btn-round btn-signin-social"><i class="fa  fa-instagram instagram-color"></i> {{trans('lang.sign_up_instagram')}}</a>
            </div>
            <div class="form-group col-md-4">   
            
               
                <a  href="{{route('cadWithAuth')}}" class="btn btn-round btn-signin-social"><i class="fa  fa-youtube youtube-color"></i> {{trans('lang.sign_up_youtube')}}</a>
            </div>
        </div>


                      <div class="bottom">
                        <span class="helper-text"> {{trans('lang.ALREADY_USING')}}<a href="{{route('login')}}">{{trans('lang.Login')}}</a></span>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->

<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
</body>
</html>
