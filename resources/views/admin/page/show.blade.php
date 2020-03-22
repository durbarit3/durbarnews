@extends('admin.master')
@section('title', 'Show Page')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_area">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Page Information</span></div>
                    </div>

                    <div class="panel_body">
                        <div class="col-md-10 offset-md-1">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Title</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="title" type="text" disabled value="{{$page->title}}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-right">Slug</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="slug" type="search" disabled value="{{$page->slug}}" id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Description</label>
                                    <div class="col-sm-9">
                                        <textarea  name="description" id="editor1" class="form-control" disabled rows="10" cols="80">
                                        {!! $page->description !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Meta Tag</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="meta_tag" type="text" disabled value="{{$page->meta_tag}}" id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Meta Description</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="meta_description" disabled type="text" value="{{$page->meta_description}}" id="example-url-input">
                                    </div>
                                </div>

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
