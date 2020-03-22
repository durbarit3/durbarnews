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
    background-color: #080000cf;
    /* width: 40px; */
    font-size: 11px;
    height: 24px;
    padding: 2px 5px;
    line-height: 24px;
    text-decoration: none;
    text-align: center;
}
.single-block {
    background-color: #f1f1f1;
    min-height: 80px;
}
.archive_img_box a img {
    height: 80px !important;
}
h3.no-margin {
    margin-bottom: 0px;
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
                                <h4>অনুসন্ধানের ফলাফল</h4>
                                <hr>
                            </div>
                        </div>
                    </div>
                    @if (isset($searchNews))

                    <div class="row mt-5">
                        @if ($searchNews->count() > 0)
                        @foreach ($searchNews as $news)
                        <div class="col-sm-6 min_height mb-1">
                            <div class="single-block">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="archive_img_box">
                                            <a @if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('details/'.$news->slug.'/'.$news->id)}}" @endif>
                                                <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/small/'.$news->image)}}" alt=""
                                                class="lazy img-fluid">
                                                @if($news->post_type==2)
                                                <a @if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('details/'.$news->slug.'/'.$news->id)}}" @endif class="play-button">
                                                    <i class="fas fa-play"></i>
                                                </a>
                                                @endif
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
                                            <a @if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('details/'.$news->slug.'/'.$news->id)}}" @endif>
                                                {{ Str::limit($news->title, 40)}}
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
                            <h4>কোন ফলাফল পাওয়া যায়নি</h4>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="col-md-12 text-center">
                        <h4>কোন ফলাফল পাওয়া যায়নি</h4>
                    </div>
                    @endif
                </div>
                <div class="pagination_area mt-3 row">
                </div>

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

