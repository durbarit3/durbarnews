@extends('website.master')
@push('css')
<style>
       .no-margin a {
    color: black!important;
    font-size: 17px!important;
    text-decoration: none!important;
}
.box-white {
    background-color: #eaeaea;
    padding: 15px;
}
.box-aches {
    margin-top: 30px;
}
.single-block {
    background-color: #f1f1f1;
}
.archive_img_box {
    position: relative;
}
.overlay_category a {
    position: absolute;
    left: 7px;
   bottom: 6px;
    color: #fff;
    background-color: rgba;
    background-color: #00000087;
    width: 40px;
    height: 24px;
    line-height: 24px;
    text-decoration: none;
    text-align: center;
}

</style>
<link rel="stylesheet" href="{{ asset('public/website/detatils.css') }}">
@endpush
@section('content')
<!-- ad section start -->
<section id="ad" style="padding: 10px 0px;"  class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="ad_main">
                    <a href="#">
                        <img src="images/15798962006367364458.gif" class="w-100" alt="">
                    </a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- ad section end -->
    <!-- archive main section -->
    <section id="archive">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="news-head">
                                <h4>সব খবর</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                        <form class="form-horizontal" action="{{ route('website.archive.search') }}" method="get">
                            @csrf
                                <div class="box-white">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                                <option value="">--Select Category--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="keyword" class="form-control" id="search-text"
                                                placeholder="আপনি কী খুঁজছেন?">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-aches">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <select id="division" name="division_id"  class="form-control" id="exampleFormControlSelect1">
                                                <option value="">--Select Division--</option>
                                                @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name_bn }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select id="districts" name="district_id" class="form-control" id="exampleFormControlSelect1">

                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select id="sub-district" name="sub_district_id" class="form-control" id="exampleFormControlSelect1">

                                            </select>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <a href="#" class="btn btn-danger btn-block">All News Search</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (isset($searchNews))
                    <div class="row mt-5">
                        @if ($searchNews->count() > 0)
                        @foreach ($searchNews as $news)
                        <div class="col-sm-6 mb-1">
                            <div class="single-block">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="archive_img_box">
                                            <a href="#">

                                                <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/small/'.$news->image)}}" alt=""
                                                class="lazy img-fluid">
                                            </a>
                                            <div class="overlay_category">
                                            <a href="#">

                                            {{ $news->Cate->name }}
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 text-left">
                                        <h3 class="no-margin">
                                            <a href="#">
                                                {{ $news->title }}
                                            </a>
                                        </h3>
                                        {{-- <small class="text-muted">০১:৪২ পিএম, ০৮ মার্চ ২০২০, রোববার</small> --}}
                                    <small class="text-muted">{{ $news->created_at->toFormattedDateString() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-md-12 text-center">
                            <h4>No Result Found!</h4>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="pagination_area mt-3 row">
                </div>
                    @elseif(isset($newsPosts))
                    <div class="row mt-5">
                        @foreach ($newsPosts as $newsPost)
                        <div class="col-sm-6 mb-1">
                            <div class="single-block">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="archive_img_box">
                                            <a href="#">

                                                <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/small/'.$newsPost->image)}}" alt=""
                                                class="lazy img-fluid">
                                            </a>
                                            <div class="overlay_category">
                                            <a href="#">

                                            {{ $newsPost->Cate->name }}
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 text-left">
                                        <h3 class="no-margin">
                                            <a href="#">
                                                {{ $newsPost->title }}
                                            </a>
                                        </h3>
                                        {{-- <small class="text-muted">০১:৪২ পিএম, ০৮ মার্চ ২০২০, রোববার</small> --}}
                                    <small class="text-muted">{{ $newsPost->created_at->toFormattedDateString() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination_area mt-3 row">
                    {{ $newsPosts->links() }}
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- archive main section -->
    <!-- ad part start -->
    <section style="padding:30px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <div class="ad-part">
                        <a href="#">
                            <img src="images/3325802211444676497.jpg" class="w-100" alt="no-image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ad part end -->

    @endsection

    @push('js')
    <script>
        $(document).ready(function () {
           $(document).on('change', '#division', function(){
               var division_id = $(this).val();
               $.ajax({
                   url:"{{ url('archive/get/districts/by/division/id/') }}" + "/" + division_id,
                   type:'get',
                   dataType:'json',
                   success:function(data){
                        $('#districts').empty();
                        $('#districts').append('<option value="">---Select district---</option>');
                        $.each(data,function(key, value){
                            $('#districts').append('<option value="'+value.id+'">'+ value.name_bn +'</option>');
                        })
                   }
               });
           });
       });
    </script>

    <script>
        $(document).ready(function () {
           $(document).on('change', '#districts', function(){
               var district_id = $(this).val();
               $.ajax({
                   url:"{{ url('archive/get/sub_districts/by/district/id/') }}" + "/" + district_id,
                   type:'get',
                   dataType:'json',
                   success:function(data){
                        $('#sub-district').empty();
                        $('#sub-district').append('<option value="">---Select sub-district---</option>');
                        $.each(data,function(key, value){
                            $('#sub-district').append('<option value="'+value.id+'">'+ value.name +'</option>');
                        })
                   }
               });
           });
       });
    </script>
    @endpush
