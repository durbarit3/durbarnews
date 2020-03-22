@extends('admin.master')
@section('title', 'Edit Page')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_area">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Edit Page</span></div>
                    </div>
                    <div class="panel_body">
                        <div class="col-md-10 offset-md-1">

                            @if($page)
                            <form class="py-2" action="{{route('admin.page.update',$page->id)}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Title</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="title" type="text" value="{{$page->title}}" id="example-text-input">
                                        @error('title')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-right">Slug</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="slug" type="search" value="{{$page->slug}}" id="example-search-input">
                                        @error('slug')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Description</label>
                                    <div class="col-sm-9">
                                        <textarea  name="description" id="editor1" class="form-control" rows="10" cols="80">
                                        {{$page->description}}
                                        </textarea>
                                        @error('description')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Meta Tag</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="meta_tag" type="text" value="{{$page->meta_tag}}" id="example-url-input">
                                        @error('meta_tag')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Meta Description</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="meta_description" type="text" value="{{$page->meta_description}}" id="example-url-input">
                                        @error('meta_description')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-blue float-right form-control">Update Page</button>
                            </form>
                            @endif
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
