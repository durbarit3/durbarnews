@extends('admin.master')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_area">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Add Page</span></div>
                    </div>
                    <div class="panel_body">
                        <div class="col-md-10 offset-md-1">

                     
                            <form class="py-2" action="{{route('admin.contact.info.update')}}" method="post">
                                @csrf
                               
    

                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-right">Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="name" type="text" value="{{$contact->info->name}}" id="example-search-input">
                                        @error('name')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Address</label>
                                    <div class="col-sm-9">
                                        <textarea name="address" id="editor1" class="form-control" rows="5">
                                            {{$contact->info->address}}
                                        </textarea>
                                        @error('address')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Phone One</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="phoneone" type="text" value="{{$contact->info->phoneone}}" id="example-url-input">
                                        @error('phoneone')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Phone Two</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="phonetwo" type="text" value="{{$contact->info->phonetwo}}" id="example-url-input">
                                        @error('phonetwo')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">TelePhone</label>
                                    <div class="col-sm-9">
                                        <input class="form-control"  name="telephone" type="text" value="{{$contact->info->telephone}}" id="example-url-input">
                                        @error('telephone')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="email" type="email" value="{{$contact->info->email}}" id="example-url-input">
                                        @error('email')

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

@endsection

@push('scripts')
<!-- ckeditor Js -->
<script src="{{asset('public/admins/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/admins/plugins/ckeditor/ckeditor-active.js')}}"></script>

@endpush