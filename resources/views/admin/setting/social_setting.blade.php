@extends('admin.master')
@section('title', 'Social Media Settings')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_area">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Add Social Link</span></div>
                    </div>



                    <div class="panel_body">
                        <div class="col-md-10 offset-md-1">

                            <form class="py-2" action="{{route('admin.social.update')}}" method="post">
                                @csrf

                            <div class="form-group row">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-12">
                                     <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id=""><i class="fab fa-facebook"></i></span>
                                      </div>
                                      <input type="hidden" name="id" class="form-control"value="1">
                                      <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="{{$social->info->facebook}}">
                                    </div>

                                </div>
                            </div>

                             <div class="form-group row">
                              <div class="col-sm-2"></div>
                                <div class="col-sm-12">
                                     <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-twitter"></i></span>
                                      </div>
                                      <input type="text" name="twitter" class="form-control"  placeholder="Twitter" value="{{$social->info->twitter}}">
                                    </div>

                                </div>
                            </div>
                             <div class="form-group row">
                              <div class="col-sm-2"></div>
                                <div class="col-sm-12">
                                     <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                                      </div>
                                      <input type="text" name="youtube" class="form-control" placeholder="Youtube" value="{{$social->info->youtube}}">
                                    </div>

                                </div>
                            </div>
                             <div class="form-group row">
                              <div class="col-sm-2"></div>
                                <div class="col-sm-12">
                                     <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-instagram"></i></span>
                                      </div>
                                      <input type="text" name="instagram" class="form-control" placeholder="Instragram" value="{{$social->info->instagram}}">
                                    </div>

                                </div>
                            </div>
                             <div class="form-group row">
                              <div class="col-sm-2"></div>
                                <div class="col-sm-12">
                                     <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-android"></i></span>
                                      </div>
                                      <input type="text" name="android" class="form-control" placeholder="Android" value="{{$social->info->android}}">
                                    </div>

                                </div>
                            </div>
                             <div class="form-group row">
                              <div class="col-sm-2"></div>
                                <div class="col-sm-12">
                                     <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-apple"></i></span>
                                      </div>
                                      <input type="text" name="apple" class="form-control" placeholder="Apple" value="{{$social->info->apple}}">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row ">
                              <div class="col-sm-2"></div>
                                <div class="col-sm-12">
                                     <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-rss-square"></i></span>
                                      </div>
                                      <input type="text" name="feed" class="form-control" placeholder="Feed" value="{{$social->info->feed}}">
                                    </div>

                                </div>
                            </div>





                          <div class="form-group row text-center">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-12">
                                    <input class="btn btn-primary" type="submit" value="Update Social Link">
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- end panel -->
                    </div>
                </div>
            </div>

        </div><!-- /row -->
    </section>
</div>
<!--/middle content wrapper-->

@endsection

@push('scripts')
<!-- ckeditor Js -->
<script src="{{asset('public/admins/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/admins/plugins/ckeditor/ckeditor-active.js')}}"></script>
@endpush
