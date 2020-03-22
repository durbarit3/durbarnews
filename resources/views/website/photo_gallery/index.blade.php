@extends('website.master')
@section('content')
<section id="photo_gallary_main">
    <div class="container">
        <div class="margintop1">
            <div class="row">
                <div class="col-sm-8">
                    <div class="photo_gallary owl-carousel owl-theme">
                        @if ($slideGalleries)
                            @foreach ($slideGalleries as $slideGallery)
                        <div class="item">

                            <div class="item_image">
                            <a href="{{ route('website.gallery.details', $slideGallery->slug) }}">
                                    <img src="{{asset('public/uploads/gallery/thumbnail/'.$slideGallery->thumbnail_photo)}}" alt="">
                            </a>
                            </div>
                            <div class="item_cont">
                            <span>{{ $slideGallery->thumbnail_caption }}</span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="row mt-4">
                        @if ($slideUnderGalleries)
                        @foreach ($slideUnderGalleries as $slideUnderGallery)
                            <div class="col-sm-3">
                                <div class="single-block">
                                    <div class="img-box">
                                        <a href="#">
                                            <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/gallery/thumbnail/'.$slideUnderGallery->thumbnail_photo)}}" alt=""
                                                class="lazy img-fluid">
                                        </a>
                                    </div>
                                    <a href="#" class="badge-image">
                                        {{ $slideUnderGallery->category->name }}
                                    </a>
                                    <h4 style="font-size: 14px;padding:5px;">
                                        <a href="#" style="color: #000;text-decoration: none;">
                                            <span>{{ $slideUnderGallery->thumbnail_caption }}</span>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                @include('website.include.sidenews')
            </div>
        </div>
        @if ($firstCategoryGalleries)
        <div class="margintop2">
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
            @foreach ($firstCategoryGalleries as $gallery)

                <div class="col-sm-3">
                    <div class="single-block">
                        <div class="img_box">
                            <a href="{{ route('website.gallery.details', $gallery->slug) }}">
                                <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/gallery/thumbnail/'.$gallery->thumbnail_photo)}}" alt=""
                                                class="lazy img-fluid">
                            </a>
                            <h4 class="photo_head">
                                <a href="{{ route('website.gallery.details', $gallery->slug) }}">
                                   {{ $gallery->thumbnail_caption }}
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        </div>

        @endif


    </div>

    </div>
</section>

@endsection
