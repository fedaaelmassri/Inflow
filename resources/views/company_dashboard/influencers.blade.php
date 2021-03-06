@extends('layouts.dashboard')
@section('profile','active')
@section("title", " المؤثرين")
@section("css")



@endsection

@section("content")

  
         

            <div class="row clearfix">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <ul class="list-group mt-0 mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">All Contacts<span class="badge badge-info">14</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Dentist<span class="badge badge-primary">2</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Gynecologist<span class="badge badge-warning">1</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Nursing<span class="badge badge-danger">14</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Audiology<span class="badge badge-success">2</span></li>
                    </ul>
                    <small class="text-muted">LOCATION</small>
                    <ul class="list-group mt-2 mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">San Francisco<span class="badge badge-info">14</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Los Angeles<span class="badge badge-primary">2</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">New York<span class="badge badge-warning">1</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Las Vegas<span class="badge badge-danger">14</span></li>
                    </ul>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6">
                            <div class="card c_grid c_yellow">
                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" src="../assets/images/sm/avatar1.jpg" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0">Michelle Green</h6>
                                    <span>jason-porter@info.com</span>
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-slack"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <button class="btn btn-default btn-sm">Follow</button>
                                    <button class="btn btn-default btn-sm">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card c_grid c_indigo">
                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" src="../assets/images/sm/avatar2.jpg" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0">Jason Porter</h6>
                                    <span>Carol@info.com</span>
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-skype"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                    <button class="btn btn-default btn-sm">Follow</button>
                                    <button class="btn btn-default btn-sm">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card c_grid c_pink">
                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" src="../assets/images/sm/avatar3.jpg" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0">David Wallace</h6>
                                    <span>Michelle@info.com</span>
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-slack"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <button class="btn btn-default btn-sm">Follow</button>
                                    <button class="btn btn-default btn-sm">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card c_grid c_cyan">
                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" src="../assets/images/sm/avatar4.jpg" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0">Michelle Green</h6>
                                    <span>jason-porter@info.com</span>
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-slack"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <button class="btn btn-default btn-sm">Follow</button>
                                    <button class="btn btn-default btn-sm">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card c_grid c_red">
                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" src="../assets/images/sm/avatar5.jpg" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0">Michelle Green</h6>
                                    <span>jason-porter@info.com</span>
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-slack"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <button class="btn btn-default btn-sm">Follow</button>
                                    <button class="btn btn-default btn-sm">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card c_grid c_blue">
                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" src="../assets/images/sm/avatar6.jpg" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0">Michelle Green</h6>
                                    <span>jason-porter@info.com</span>
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <button class="btn btn-default btn-sm">Follow</button>
                                    <button class="btn btn-default btn-sm">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card c_grid c_green">
                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" src="../assets/images/sm/avatar1.jpg" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0">Sean Black</h6>
                                    <span>jason-porter@info.com</span>
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-slack"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <button class="btn btn-default btn-sm">Follow</button>
                                    <button class="btn btn-default btn-sm">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card c_grid c_cyan">
                                <div class="body text-center">
                                    <div class="circle">
                                        <img class="rounded-circle" src="../assets/images/sm/avatar2.jpg" alt="">
                                    </div>
                                    <h6 class="mt-3 mb-0">David Wallace</h6>
                                    <span>jason-porter@info.com</span>
                                    <ul class="mt-3 list-unstyled d-flex justify-content-center">
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-flickr"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-dropbox"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-apple"></i></a></li>
                                        <li><a class="p-3" target="_blank" href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                    <button class="btn btn-default btn-sm">Follow</button>
                                    <button class="btn btn-default btn-sm">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    

@endsection