@extends('website.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/website/css/detail.css') }}">
<link rel="stylesheet" href="{{ asset('public/website/css/video.css') }}">
@endpush
@section('content')

<section id="video">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb no-margin" style="background: #f6f6f6;">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">
                            <i class="fas fa-home text-danger" style="position: relative;bottom:11px;"></i>
                        </a></li>
                    <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">
                        {{ $gallery->category->name }}</li>
                    @if ($gallery->sub_category_id)
                    <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">
                        {{ $gallery->subCategory->name }}</li>
                    @endif


                </ol>
            </div>
        </div>
        <div class="video-part">
            <div class="row">
                <div class="col-sm-8 main-content">

                    <div class="video-heading">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="time">
                                    <span class="small text-muted"
                                        style="font-size: 13px;position: relative;bottom: 0px;">
                                        <i class="far fa-clock"></i>
                                        {{ $gallery->created_at->toFormattedDateString() }}
                                    </span>

                                </div>
                                <blockquote class="qoute">
                                    <p>{{ $gallery->thumbnail_caption }}</p>
                                </blockquote>
                                <!-- tag -->

                                <!-- social_media -->
                                <div class="social_media_share">
                                    <ul>
                                        <li>
                                            <button type="button" class="facebook"><i
                                                    class="fab fa-facebook-f"></i></button>
                                        </li>
                                        <li>
                                            <button type="button" class="twitter"><i
                                                    class="fab fa-twitter"></i></button>
                                        </li>
                                        <li>
                                            <button type="button" class="whatsapp"><i
                                                    class="fab fa-whatsapp"></i></button>
                                        </li>
                                        <li>
                                            <button type="button" class="print"> <i class="fas fa-print"></i></button>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                            <!-- <div class="col-sm-6 text-right">

                            </div> -->

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="lightbox">
                                    <ul class="light_gallery">
                                        @foreach ($gallery->galleryPhotos as $galleryPhoto)
                                        <li>
                                            <div class="single_block_light">
                                                <div class="img_box_light">
                                                    <a href="#"><img src="images/anisul-20200308143116.jpg"
                                                            class="w-100" alt="" /></a>
                                                    <img src="" alt="">
                                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                                        data-src="{{asset('public/uploads/gallery/'.$galleryPhoto->photo)}}"
                                                        alt="" class="lazy img-fluid">
                                                </div>
                                                <p style="margin-top: 10px;">{{ $galleryPhoto->caption }}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <aside class="col-sm-4 aside">
                    <h2 class="catTitle">
                        সর্বশেষ
                        <div class="liner"></div>
                    </h2>
                    <div class="row single-media-video">
                        <div class="col-sm-12">
                            <div class="media_list">
                                @foreach ($latestNewsPosts as $newsPost)
                                <div class="media">
                                    <div class="media_left">
                                        <a href="#">
                                            <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                                data-src="{{asset('public/uploads/newspost/small/'.$newsPost->image)}}"
                                                alt="" class="lazy img-fluid">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            {{ $newsPost->title }} |
                                            {{ $newsPost->created_at->toFormattedDateString() }}
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </aside>
            </div>
        </div>
        @if ($firstCategoryGalleries)
        <div class="row">
            <div class="col-sm-12">
                <div class="marginfeature">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="live-heading">
                                <h4 class="catTitle">
                                    <a href="#">
                                        <i class="fas fa-camera"></i> {{ $firstCategory->name }}
                                    </a>
                                    <span class="liner"></span>
                                </h4>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        @foreach ($firstCategoryGalleries as $firstCategoryGallery)
                        <div class="col-sm-3">
                            <div class="single-block">
                                <div class="img_box">
                                    <a href="{{ route('website.gallery.details', $firstCategoryGallery->slug) }}">
                                        <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/gallery/thumbnail/'.$firstCategoryGallery->thumbnail_photo)}}" alt=""
                                                class="lazy img-fluid">
                                    </a>
                                    <h4 class="photo_head">
                                        <a href="{{ route('website.gallery.details', $firstCategoryGallery->slug) }}">
                                            {{ $firstCategoryGallery->thumbnail_caption }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- ad part start -->

        <div class="row mt-2">
            <div class="col-sm-8 offset-2">
                <div class="ad-part">
                    <a href="#">
                        <img src="images/3325802211444676497.jpg" class="w-100" alt="no-image">
                    </a>
                </div>
            </div>
        </div>

        <!-- ad part end -->



    </div>
</section>
@endsection
