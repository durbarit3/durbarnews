@extends('admin.master')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_area">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Add Logo</span></div>
                    </div>
                    <div class="panel_body">
                        <div class="col-md-10 offset-md-1">

                        

                            <form class="py-2" action="{{route('admin.logo.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Front Logo</label>
                                    <div class="col-sm-9">
                                        <input class="form-control dropify" name="frontlogo" type="file" value="" id="example-text-input" data-default-file="{{asset('public/admins/images/logo')}}/{{$logos->frontlogo}}">
                                        <small style="color: red"><strong>Less than 2MB | Size 250 x 60</strong></small>
                                        @error('frontlogo')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Favicon</label>
                                    <div class="col-sm-9">
                                        <input class="form-control dropify" name="favicon" type="file" value="" id="example-text-input" data-default-file="{{asset('public/admins/images/logo')}}/{{$logos->favicon}}">
                                        <small style="color: red"><strong>Less than 2MB | Size 64 x 64</strong></small>
                                        @error('favicon')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Admin Logo</label>
                                    <div class="col-sm-9">
                                        <input class="form-control dropify" name="adminlogo" type="file" value="" id="example-text-input" data-default-file="{{asset('public/admins/images/logo')}}/{{$logos->adminlogo}}">
                                        <small style="color: red"><strong>Less than 2MB |  Size 220 x 40</strong></small>
                                        @error('adminlogo')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Login Banner</label>
                                    <div class="col-sm-9">
                                        <input class="form-control dropify" name="loginbanner" type="file" value="" id="example-text-input" data-default-file="{{asset('public/admins/images/logo')}}/{{$logos->loginbanner}}">
                                        <small style="color: red"><strong>Less than 2MB |  Size 800 x 600</strong></small>
                                        @error('adminlogo')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-blue float-right form-control">Submit</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


@endsection

@push('scripts')

<script>
$( document ).ready(function() {
    $('.dropify').dropify();    
});
</script>
@endpush