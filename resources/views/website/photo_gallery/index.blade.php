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
                <div class="col-sm-4">

                    <div class="row mt-4">
                        <div class="col-sm-12 p-0 news_list nt" style=" height:500px;">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Latest News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">Populer
                                        News</a>
                                </li>

                            </ul>
                            <div class="tab-content nav-detail-photo" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/ashraful-20200225104941.jpg" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/samira-01-20200226132030.webp" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/netflix-20200225162641.jpg" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/nayeem-20200225103539.jpg" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/iran-20200223220447.webp" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/afridi-20200225095919.webp" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>



                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">

                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/jubo-20200225121652.webp" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/samira-01-20200226132030.webp" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/netflix-20200225162641.jpg" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/nayeem-20200225103539.jpg" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/iran-20200223220447.webp" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">

                                                <a href="#">
                                                    <img src="images/afridi-20200225095919.webp" alt="no-image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4>
                                                        <a href="#"
                                                            style="font-size:16px;font-weight:600;color:#000">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>
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
