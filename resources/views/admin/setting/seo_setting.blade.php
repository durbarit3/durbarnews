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

                            <form class="py-2" action="{{route('admin.seo.update')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Meta Title
</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$seo->info->title}}" id="example-text-input" name="title">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-right">Meta Author</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search" value="{{$seo->info->author}}" id="example-search-input" name="author">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-right">Meta Keyword</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search" value="{{$seo->info->keyword}}" id="example-search-input" name="keyword">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Meta Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" id="editor1"  class="form-control text-left" rows="5" cols="5">
                                        {{$seo->info->description}}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-right">Google Verification</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="search" value=" {{$seo->info->gverification}}" id="example-search-input" name="gverification">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Bing Verification</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="bverification" value="{{$seo->info->bverification}}" id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Google Analytics</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$seo->info->ganalytics}}" name="ganalytics" id="example-url-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Alexa Analytics</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$seo->info->alexaanalytics}}" name="alexaanalytics" id="example-url-input">
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