@extends('admin.master')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_area">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Add Our Say</span></div>
                    </div>
                    <div class="panel_body">
                        <div class="col-md-10 offset-md-1">
                        
                        <form class="py-2" action="{{route('admin.our.say.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-right">Title</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="title" type="search" value="{{$oursay->title}}" id="example-search-input">
                                        @error('title')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" id="editor1" class="form-control" rows="10" cols="80">
                                        {{$oursay->description}}
                                        </textarea>
                                        @error('description')

                                        <div class="alert alert-danger my-2">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">Image</label>
                                    <div class="col-sm-3 my-3">
                                        <input class="form-control" name="image" type="file" value="" id="example-url-input">
                                        @error('meta_tag')
                                            <div class="alert alert-danger my-2">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-5">
                                        <img src="{{asset('public/admins/images/oursay')}}/{{$oursay->image}}" alt="">
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