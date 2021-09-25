@extends('layouts.dashboard')
@section('profile_influencer','active')
@section("title", "صفحتي الشخصية")
@section("css")


<style>

.social .profile-header {
    box-shadow: inset 0 0 0 2000px rgb(158 46 150 / 82%) !important ;
}


</style>
@endsection

@section("content")

    @if(session('message_flash'))
        <div class="alert alert-success">
            {{session('message_flash')}}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card social">
                <div class="profile-header d-flex justify-content-between justify-content-center">
                    <div class="d-flex">
                        <div class="mr-3">
                            <img src="{{asset('assets/images/user-small.png') }}" class="rounded" alt="">
    
    
                            </div>
                        
                       <strong>{{$user->name }} 
                    
                        <div class="details">
                            <h5 class="mb-2"></h5>
                     @if($user->role_id == 1)
                            <span class="text-light">مؤثر </span>
                            @else
                            <span class="text-light"> شركة</span>
@endif
                   
                        </div>
                    </strong>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h2>المعلومات الأساسية</h2>
                </div>
                <div class="body">
                    <form method="POST" action="" id="basic-form"
                          novalidate enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="control-label">الاسم الأول</label>
                                    <input type="text" value=""  name="name" required
                                           class="form-control" placeholder="الاسم ال أول">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label class="control-label">الاسم الأخير</label>
                                    <input type="text" value="" name="lname" required
                                           class="form-control" placeholder="الاسم الأخير">
                                    @if ($errors->has('lname'))
                                        <p class="text-danger">{{$errors->first('lname')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> رابط الشركة</label>
                                    <input type="text" class="form-control" value="" required
                                           name="company_link" placeholder=" رابط الشركة">
                                    @if ($errors->has('company_link'))
                                        <p class="text-danger">{{$errors->first('company_link')}}</p>
                                    @endif
                                </div>
                            </div>




                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> اسم الشركة</label>
                                    <input value="" type="text" name="company_name" required
                                           class="form-control"  placeholder=" اسم الشركة ">  
                                    @if ($errors->has('company_name'))
                                        <p class="text-danger">{{$errors->first('company_name')}}</p>
                                    @endif
                                </div>
                            </div>
                         
                            <div class="col-lg-12 col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">تعديل</button> &nbsp;&nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <div class="col-xl-4 col-lg-4 col-md-5">
            <div class="card">
                <div class="header">
                    <h2>تعديل كلمة المرور</h2>
                </div>
                <div class="body">
                    <form method="POST" action="" id="basic-form-pass" novalidate
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="email" value="" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="current-password"
                                           class="form-control @error('current-password') is-invalid @enderror" required
                                           placeholder="كلمة السر الحالية">
                                    @error('current-password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="new-password"
                                           class="form-control @error('new-password') is-invalid @enderror" required
                                           placeholder="كلمة السر الجديدة">
                                    @error('new-password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="new-password_confirmation" class="form-control"
                                           placeholder="تأكيد كلمة السر الجديدة">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">تفيير كلمة المرور</button> &nbsp;&nbsp;
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection


@section("js")
<script src="{{asset('assets/vendor/jquery-validation/jquery.validate.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.0.6/parsley.min.js"></script>

<!-- Jquery Validation Plugin Css -->
<!-- data table js -->
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{asset('assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/pages/ui/dialogs.js')}}"></script>


<script>

    
    $(function () {
        $('#basic-form').parsley();
    });
    
      $(function () {
        $('#basic-form-pass').parsley();
    });
</script>

@endsection
