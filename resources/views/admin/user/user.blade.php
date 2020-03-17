@extends('admin.master')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_area">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel">
        
                    <div class="panel_header">
                        <div class="panel_title"><span>Add User</span></div>
                    </div>
                    

                   

                    <div class="panel_body">
                        <div class="col-md-10 offset-md-1">


                            <form class="py-2" action="{{route('admin.user.store')}}" method="POST">
                                @csrf
                                <div class="form-group row has-success">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Name<span style="color:red;">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="adminname" value="{{old('adminname')}}" class="form-control">
                                        @error('adminname')
                                        <div class="text-danger">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                        
                                    </div>
                                </div>


                                <div class="form-group row has-success">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Email<span style="color:red;">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="email" value="{{old('email')}}" name="email" class="form-control">
                                        @error('email')
                                        <div class="text-danger">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Phone<span style="color:red;">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{old('phone')}}" name="phone" class="form-control">
                                        @error('phone')
                                        <div class="text-danger">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Password<span style="color:red;">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                        <div class="text-danger">
                                            <small>{{$message}}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Repassword</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Designation</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="{{old('designation')}}" name="designation" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row skin-square">
                                    <div class="col-md-3"></div>
                                    <div class="col-sm-4">
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="newspost" value="1">
                                            <label for="flat-checkbox-1">News Post</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="videonewspost" value="1">
                                            <label for="flat-checkbox-1">Video News</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="pages" value="1">
                                            <label for="flat-checkbox-1">Pages</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="managesection" value="1">
                                            <label for="flat-checkbox-1">Manage Section</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="category" value="1">
                                            <label for="flat-checkbox-1">Category</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="subcategory" value="1">
                                            <label for="flat-checkbox-1">Subcategory</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="division" value="1">
                                            <label for="flat-checkbox-1">Division</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="district" value="1">
                                            <label for="flat-checkbox-1">District</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="subdistrict" value="1">
                                            <label for="flat-checkbox-1">Sub District</label>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="settings" value="1">
                                            <label for="flat-checkbox-1">Settings</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="writters" value="1">
                                            <label for="flat-checkbox-1">Writter</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="color" value="1">
                                            <label for="flat-checkbox-1">Color</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="extra" value="1">
                                            <label for="flat-checkbox-1">Extra</label>
                                        </div>

                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="footer" value="1">
                                            <label for="flat-checkbox-1">Footer</label>
                                        </div>

                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="user" value="1">
                                            <label for="flat-checkbox-1">User</label>
                                        </div>

                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="advertisement" value="1">
                                            <label for="flat-checkbox-1">Advertisement</label>
                                        </div>
                                        <div class="i-check">
                                            <input tabindex="13" type="checkbox" id="flat-checkbox-1" name="notice" value="1">
                                            <label for="flat-checkbox-1">Notice</label>
                                        </div>

                                    </div>

                                </div>


                                <div class="form-group row text-center">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <input class="btn btn-primary" type="submit" value="Add Writers">
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