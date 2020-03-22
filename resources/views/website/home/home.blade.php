@extends('website.master')
@push('css')
    <style>

    a.play-button-latest i {
    position: absolute;
    left: 47%;
    top: 50%;
    transform: translate(-50%,-50%);
    background-color: #000;
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    font-size: 12px;
    color: #fff;
    border-radius: 50%;
}

    </style>
@endpush
@section('content')
<section id="recent">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    @if($bigthumpost)
                    <div class="col-sm-8">
                        <div class="image_box main_box">
                            <div class="main_image">
                                <a @if($bigthumpost->post_type==2)
                                    href="{{url('/videodetails/'.$bigthumpost->slug.'/'.$bigthumpost->id)}}" @else
                                    href="" @endif>
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/bigthum/'.$bigthumpost->image)}}"
                                        alt="" class="lazy img-fluid">
                                    @if($bigthumpost->post_type==2)
                                    <a href="{{url('/videodetails/'.$bigthumpost->slug.'/'.$bigthumpost->id)}}"
                                        class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                </a>

                            </div>
                            <div class="detail_box">
                                <h4>{!! Str::limit($bigthumpost->title,29) !!}</h4>
                                <p>{!! Str::limit($bigthumpost->description,180) !!}</p>
                            </div>
                            <div class="meta">
                                <span class="pull-left tags">
                                    <i class="fas fa-tags"></i>
                                    <a href="#">{{$bigthumpost->Cate->name}}</a>
                                </span>
                                <a href="#" class="pull-right">বিস্তারিত</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- small box content -->
                    <div class="col-sm-4">
                        @foreach($smallpost as $smpost)
                        <div class="image_box2 main_box" style="margin-bottom: 20px;">
                            <div class="main_image">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/mediumthum/'.$smpost->image)}}"
                                        alt="" class="lazy img-fluid">
                                    @if($smpost->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                </a>

                            </div>
                            <div class="detail_box2">
                                <h4>{{Str::limit($smpost->title,50)}}</h4>

                            </div>
                            <div class="meta">
                                <span class="pull-left tags">
                                    <i class="fas fa-tags"></i>
                                    <a href="#">{{$smpost->Cate->name}}</a>
                                </span>
                                <a href="#" class="pull-right">বিস্তারিত</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    @foreach($smallsecondpost as $smsecondpost)
                    <div class="col-sm-4">
                        <div class="image_box2 main_box">
                            <div class="main_image">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/mediumthum/'.$smsecondpost->image)}}"
                                        alt="" class="lazy img-fluid">

                                    @if($smsecondpost->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                </a>

                            </div>
                            <div class="detail_box2">
                                <h4>{{Str::limit($smsecondpost->title,50)}}</h4>

                            </div>
                            <div class="meta">
                                <span class="pull-left tags">
                                    <i class="fas fa-tags"></i>
                                    <a href="#">{{$smsecondpost->Cate->name}}</a>
                                </span>
                                <a href="#" class="pull-right">বিস্তারিত</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row">

                    @foreach($smalltherdpost as $sthreepost)
                    <div class="col-sm-4">
                        <div class="image_box2 main_box">
                            <div class="main_image">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/mediumthum/'.$sthreepost->image)}}"
                                        alt="" class="lazy img-fluid">
                                    @if($sthreepost->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                </a>

                            </div>
                            <div class="detail_box2">
                                <h4>{{Str::limit($sthreepost->title,50)}}</h4>

                            </div>
                            <div class="meta">
                                <span class="pull-left tags">
                                    <i class="fas fa-tags"></i>
                                    <a href="#">{{$sthreepost->Cate->name}}</a>
                                </span>
                                <a href="#" class="pull-right">বিস্তারিত</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">

                    @foreach($smallforthpost as $smforthpost)
                    <div class="col-sm-4">
                        <div class="image_box2 main_box">
                            <div class="main_image">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/mediumthum/'.$smforthpost->image)}}"
                                        alt="" class="lazy img-fluid">
                                    @if($smforthpost->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                </a>

                            </div>
                            <div class="detail_box2">
                                <h4>{{Str::limit($sthreepost->title,50)}}</h4>

                            </div>
                            <div class="meta">
                                <span class="pull-left tags">
                                    <i class="fas fa-tags"></i>
                                    <a href="#">{{$smforthpost->Cate->name}}</a>
                                </span>
                                <a href="#" class="pull-right">বিস্তারিত</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
            <!-- countdown -->
            @include('website.include.sidenews')


        </div>
    </div>
</section>
<section style="padding:30px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-2">
                <div class="ad-part">
                    <a href="#">
                        <img src="{{asset('public/website/')}}/images/15729685497866428454.gif" class="w-100"
                            alt="no-image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- recent post section end -->
<!-- pocket section start -->
<section id="video_gallery">
    <div class="container">
        <div class="row pocket_news">
            @if($videopostlatest)
            <div class="col-sm-4">
                <div class="live_heading">

                    <h4 class="catTitle">
                        <a href="#" style="background-color: #b30f0f;text-decoration: none;">Video</a>
                        <div class="liner"></div>
                    </h4>
                    <div class="single_video_first">
                        <div class="video-youtube mt-3">
                            <a href="#">

                                <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                    data-src="{{asset('public/uploads/newspost/mediumthum/'.$videopostlatest->image)}}"
                                    alt="" class="lazy w-100">

                                @if($videopostlatest->post_type==2)
                                <a href="#" class="play-button">
                                    <i class="fas fa-play"></i>
                                </a>
                                @endif
                            </a>

                        </div>
                    </div>

                    <div class="video_cont mt-3">
                        <h4>{{Str::limit($videopostlatest->title,50)}} <b>|</b>
                            <span>{{$videopostlatest->created_at}}</span></h4>
                    </div>
                </div>

            </div>
            @endif
            <div class="col-sm-8">
                <div class="pocket_tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item nav-pocket-news">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-pocket" role="tab"
                                aria-controls="home" aria-selected="true">Latest News</a>
                        </li>
                        <li class="nav-item nav-pocket-news">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-pocket" role="tab"
                                aria-controls="profile" aria-selected="false">Populer News</a>
                        </li>

                    </ul>
                    <div class="tab-content nav-pocket" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-pocket" role="tabpanel"
                            aria-labelledby="home-tab">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="video_sm_gallary owl-carousel owl-theme">
                                        @foreach($videopostpopular as $vpostpopular)
                                        <div class="item">
                                            <div class="item_image">
                                                <a href="#">
                                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                                        data-src="{{asset('public/uploads/newspost/mediumthum/'.$vpostpopular->image)}}"
                                                        alt="" class="lazy w-100">
                                                </a>
                                                @if($vpostpopular->post_type==2)
                                                <a href="#" class="play-button">
                                                    <i class="fas fa-play"></i>
                                                </a>
                                                @endif
                                            </div>
                                            <h2 style="color: #fff;font-size: 14px;margin-top:10px;">
                                                {{Str::limit($vpostpopular->title,30)}}|{{$vpostpopular->created_at}}
                                            </h2>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile-pocket" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="video_sm_gallary owl-carousel owl-theme">
                                @foreach($videopostla as $vpost)
                                <div class="item">
                                    <div class="item_image">
                                        <a href="#">
                                            <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                                data-src="{{asset('public/uploads/newspost/mediumthum/'.$vpost->image)}}"
                                                alt="" class="lazy w-100">
                                            @if($vpost->post_type==2)
                                            <a href="#" class="play-button">
                                                <i class="fas fa-play"></i>
                                            </a>
                                            @endif


                                        </a>
                                        <a href="#" class="icon">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </div>
                                    <h2 style="color: #fff;font-size: 14px;margin-top:10px;">
                                        {{Str::limit($vpost->title,30)}}|{{$vpost->created_at}}</h2>

                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="all-video" rel="nofollow">
                See More Videos <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
        <!-- </div> -->
    </div>
</section>
<!-- pocket section end -->
<!-- sports part start -->
@if($firstcate)
<section id="sport_main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 main_content">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="left">
                            <span class="cat_name">
                                <a href="#">{{$firstcate->name}}</a>
                            </span>
                            @php
                            $id=$firstcate->id;
                            $subcate=App\SubCategory::where('cate_id',$id)->where('is_deleted',0)->where('status',1)->select(['name','id'])->get();
                            @endphp
                            <span class="cat_subname">
                                @foreach($subcate as $sub)
                                <a href="{{ $sub->id}}">{{ $sub->name}}</a>
                                @endforeach

                            </span>
                        </h4>

                    </div>
                    <div class="col-sm-4 text-right">
                        <span class="news">
                            <a href="#">All News<i class="fas fa-angle-double-right"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @php
            $catenews=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$firstcate->id)->limit(12)->get();
            @endphp
            @foreach($catenews as $cnews)
            <div class="col-sm-3">
                <div class="image_box2 main_box2">
                    <div class="main_image">
                        <a href="#">
                            <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                data-src="{{asset('public/uploads/newspost/mediumthum/'.$cnews->image)}}" alt=""
                                class="lazy w-100">
                            @if($cnews->post_type==2)
                            <a href="#" class="play-button">
                                <i class="fas fa-play"></i>
                            </a>
                            @endif
                        </a>

                    </div>
                    <div class="detail_box2">
                        <h4>{{Str::limit($vpost->title,50)}}</h4>

                    </div>
                    <div class="meta2">
                        <span class="pull-left tags">
                            <i class="fas fa-tags"></i>
                            <a href="#">{{$vpost->Cate->name}}</a>
                        </span>
                        <a href="#" class="pull-right">বিস্তারিত</a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif
<!-- sports part end -->

<!-- ad part end -->
<!-- desh start -->
@if($secondcate)
<section id="desh">
    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">{{$secondcate->name}}</a>
                                <div class="liner"></div>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    @php
                    $secondcatepost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$secondcate->id)->OrderBy('id','DESC')->first();
                    @endphp
                    @if($secondcatepost)
                    <div class="col-sm-6">
                        <div class="image_box2 main_box2">
                            <div class="main_image">
                                <a href="#">

                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/mediumthum/'.$secondcatepost->image)}}"
                                        alt="" class="lazy w-100">
                                    @if($secondcatepost->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif

                                </a>

                            </div>
                            <div class="detail_box2">
                                <h4>{{Str::limit($secondcatepost->title,50)}}</h4>
                            </div>
                            <div class="meta2">
                                <span class="pull-left tags">
                                    <i class="fas fa-tags"></i>
                                    <a href="#">বিস্তারিত</a>
                                </span>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col-sm-6">

                        @php
                        $secondcepost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$secondcate->id)->OrderBy('id','DESC')->skip(1)->limit(4)->get();
                        @endphp
                        @foreach($secondcepost as $post)
                        <div class="media md-b">
                            <div class="media-left">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/small/'.$secondcatepost->image)}}"
                                        alt="" class="lazy w-100">
                                    @if($post->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                </a>
                            </div>
                            <div class="media-body">
                                <h4>{{Str::limit($post->title,50)}}
                                </h4>
                                <span><i class="fas fa-tags"></i>বিস্তারিত</span>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="row">
                    @php
                    $secondceteallpost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$secondcate->id)->OrderBy('id','DESC')->skip(5)->limit(4)->get();
                    @endphp
                    @foreach($secondceteallpost as $post)
                    <div class="col-sm-3">
                        <div class="image_box2 main_box2">
                            <div class="main_image">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/small/'.$post->image)}}" alt=""
                                        class="lazy w-100">
                                    @if($post->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                </a>

                            </div>
                            <div class="detail_box2">
                                <h4>{{Str::limit($post->title,25)}}</h4>

                            </div>
                            <div class="meta2">
                                <span class="pull-left tags">

                                </span>
                                <a href="#" class="pull-right">বিস্তারিত</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="comment_part">
                            <h2 class="heading-link text-center">
                                <a href="#">
                                    <span>জনপ্রিয়</span>
                                </a>
                            </h2>
                            <div class="comment-block">
                                @php
                                $newscatepost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$secondcate->id)->where('popular_news',1)->limit(3)->get();
                                @endphp
                                @foreach($newscatepost as $post)
                                <div class="media" style="padding: 10px;">
                                    <a class="pull-left" href="#">
                                        <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                            data-src="{{asset('public/uploads/newspost/small/'.$post->image)}}" alt=""
                                            class="lazy w-100">
                                        @if($post->post_type==2)
                                        <a href="#" class="play-button">
                                            <i class="fas fa-play"></i>
                                        </a>
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <h4 class="comment_heading">
                                            <a href="#">{{Str::limit($post->title,25)}}</a>
                                        </h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                    <form action="{{ route('website.search.place.wise') }}" method="get">
                            @csrf
                            <div class="link_part">
                                <h2 class="heading-link text-center">
                                    <a href="#">
                                        <span>সব খবর</span>
                                    </a>
                                </h2>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="select_option">
                                        <div class="form-group">
                                            <select required class="form-control" name="division_id" id="division_id">
                                                <option value="">বিভাগ</option>
                                                @foreach($division as $divi)
                                                <option value="{{$divi->id}}">{{$divi->name_bn}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="select_option">
                                        <div class="form-group">

                                            <select class="form-control" name="district_id" id="district_id">
                                                <option value="">জেলা</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <div class="select_option">
                                        <div class="form-group">
                                            <select class="form-control" name="subdistrict_id" id="subdistrict_id">
                                                <option value="">উপজেলা</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="submit_button">
                                        <button type="submit" class="btn btn-block"
                                            style="background-color: brown;color: #fff;">খুজুন</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- </div> -->
</section>
@endif
<!-- desh end -->
<!-- Boxnews start-->
<section id="box_news">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    @if($thirdcate)
                    <div class="col-sm-4">
                        <div class="single-cat-height">
                            <div class="live-heading">
                                <h4 class="catTitle">
                                    <a href="#">{{$thirdcate->name}}</a>
                                    <div class="liner"></div>
                                </h4>
                            </div>
                            <div class="single-block box-news-block">
                                @php
                                $newsthirdcatepost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$thirdcate->id)->OrderBy('id','DESC')->first();
                                @endphp
                                @if($newsthirdcatepost)
                                <div class="image_box">
                                    <a href="#">
                                        <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                            data-src="{{asset('public/uploads/newspost/mediumthum/'.$newsthirdcatepost->image)}}"
                                            alt="" class="lazy w-100">
                                        @if($newsthirdcatepost->post_type==2)
                                        <a href="#" class="play-button">
                                            <i class="fas fa-play"></i>
                                        </a>
                                        @endif
                                    </a>
                                    <h4 style="padding: 10px 15px 0px 15px;">
                                        {{Str::limit($newsthirdcatepost->title,40)}}</h4>

                                </div>
                                @endif

                                <div class="details">
                                    @php
                                    $newsthirdallcatepost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$thirdcate->id)->OrderBy('id','DESC')->skip(1)->limit(4)->get();
                                    @endphp
                                    @foreach($newsthirdallcatepost as $post)
                                    <div class="media">
                                        <div class="media-body" style="margin-left:0px ;">
                                            <h4 class="media-heading">
                                                <a href="#">
                                                    {{Str::limit($post->title,30)}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="allnews">
                            <a href="#">
                                All News
                            </a>

                        </div>
                    </div>
                    @endif
                    @if($forthcate)
                    <div class="col-sm-4">
                        <div class="single-cat-height">
                            <div class="live-heading">
                                <h4 class="catTitle">
                                    <a href="#">{{$forthcate->name}}
                                    </a>
                                    <div class="liner"></div>
                                </h4>
                            </div>
                            <div class="single-block box-news-block">
                                @php
                                $forthnews=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$forthcate->id)->OrderBy('id','DESC')->first();
                                @endphp

                                <div class="image_box">
                                    @if($forthnews)
                                    <a href="#">
                                        <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                            data-src="{{asset('public/uploads/newspost/mediumthum/'.$forthnews->image)}}"
                                            alt="" class="lazy w-100">

                                        @if($forthnews->post_type==2)
                                        <a href="#" class="play-button">
                                            <i class="fas fa-play"></i>
                                        </a>
                                        @endif

                                    </a>
                                    <h4 style="padding: 10px 15px 0px 15px;">{{Str::limit($forthnews->title,40)}}</h4>
                                    @endif
                                </div>
                                <div class="details">
                                    @php
                                    $newspostforthcateaa=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$forthcate->id)->skip(1)->limit(4)->get();
                                    @endphp
                                    @foreach($newspostforthcateaa as $dpost)
                                    <div class="media">
                                        <div class="media-body" style="margin-left:0px;">
                                            <h4 class="media-heading">
                                                <a href="#">
                                                    {{Str::limit($dpost->title,30)}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <div class="allnews">
                            <a href="#">
                                All News
                            </a>

                        </div>
                    </div>
                    @endif
                    @if($fivecate)
                    <div class="col-sm-4">
                        <div class="single-cat-height">
                            <div class="live-heading">
                                <h4 class="catTitle">
                                    <a href="#">
                                        {{$fivecate->name}}
                                    </a>
                                    <div class="liner"></div>
                                </h4>
                            </div>
                            <div class="single-block box-news-block">
                                <div class="image_box">
                                    @php
                                    $fivenews=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$fivecate->id)->OrderBy('id','DESC')->first();
                                    @endphp
                                    @if($fivenews)
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/mediumthum/'.$fivenews->image)}}"
                                        alt="" class="lazy w-100">
                                    @if($fivenews->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif

                                    <h4 style="padding: 10px 15px 0px 15px;">{{Str::limit($fivenews->title,40)}}</h4>
                                    @endif


                                </div>
                                <div class="details">
                                    @php
                                    $fiveallnews=App\NewsPost::where('is_deleted',0)->OrderBy('id','DESC')->where('cate_id',$fivecate->id)->limit(4)->get();
                                    @endphp
                                    @foreach($fiveallnews as $post)
                                    <div class="media">
                                        <div class="media-body" style="margin-left:0px ;">
                                            <h4 class="media-heading">
                                                <a href="#">
                                                    {{Str::limit($post->title,40)}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                        <div class="allnews">
                            <a href="#">All News</a>

                        </div>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-sm-4">

                <div class="ad-part_two">
                    <a href="#">
                        <img src="{{asset('public/website/')}}/images/4.jpg" class="w-100" alt="no-image" height="600">
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Boxnews end-->

<!-- nation part start -->
<section id="national">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                @if($sixcate)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">{{$sixcate->name}}</a>
                                <div class="liner"></div>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                    $sixcatepost=App\NewsPost::where('is_deleted',0)->where('status',1)->OrderBy('id','DESC')->where('cate_id',$sixcate->id)->limit(2)->get();
                    @endphp
                    @foreach($sixcatepost as $post)
                    <div class="col-sm-6">
                        <div class="image_box2 main_box2">
                            <div class="main_image">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/bigthum/'.$post->image)}}" alt=""
                                        class="lazy w-100">
                                    @if($post->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                </a>
                            </div>
                            <div class="detail_box2">
                                <h4>{{Str::limit($post->title,40)}}
                                </h4>
                            </div>
                            <div class="meta2">
                                <span class="pull-left tags">
                                    <i class="fas fa-tags"></i>
                                    <a href="#">বিস্তারিত</a>
                                </span>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row mt-3">
                    @php
                    $sixcateallpost=App\NewsPost::where('is_deleted',0)->where('status',1)->OrderBy('id','DESC')->where('cate_id',$sixcate->id)->skip(2)->limit(4)->get();
                    @endphp
                    @foreach($sixcateallpost as $post)
                    <div class="col-sm-3">
                        <div class="image_box2 main_box2">
                            <div class="main_image">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                        data-src="{{asset('public/uploads/newspost/mediumthum/'.$post->image)}}" alt=""
                                        class="lazy w-100">
                                    @if($post->post_type==2)
                                    <a href="#" class="play-button">
                                        <i class="fas fa-play"></i>
                                    </a>
                                    @endif
                                </a>

                            </div>
                            <div class="detail_box2">
                                <h4>{{Str::limit($post->title,25)}}</h4>

                            </div>
                            <div class="meta2">
                                <span class="pull-left tags">
                                    <i class="fas fa-tags"></i>
                                    <a href="#">বিস্তারিত</a>
                                </span>
                                <a href="#" class="pull-right"></a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endif
            </div>
            <div class="col-sm-4 aside">
                <div class="row">
                    @if($sevencate)
                    <div class="col-sm-12">
                        <div class="fb-live">
                            <h2 class="no-margin">
                                <a href="#">
                                    {{$sevencate->name}}
                                </a>
                            </h2>
                            <div class="single-block">
                                <div class="image_box">
                                    @php
                                    $sevenallpost=App\NewsPost::where('is_deleted',0)->where('status',1)->OrderBy('id','DESC')->where('cate_id',$sevencate->id)->first();
                                    @endphp
                                    @if($sevenallpost)
                                    <a href="#">
                                        <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                            data-src="{{asset('public/uploads/newspost/bigthum/'.$sevenallpost->image)}}"
                                            alt="" class="lazy w-100">
                                        @if($sevenallpost->post_type==2)
                                        <a href="#" class="play-button">
                                            <i class="fas fa-play"></i>
                                        </a>
                                        @endif

                                    </a>
                                    <h4 style="padding: 10px 15px 0px 15px;font-size: 18px;">
                                        <a href="#"
                                            style="text-decoration: none;color:rgb(109, 109, 109)">{{Str::limit($sevenallpost->title,25)}}</a>
                                    </h4>
                                    @endif

                                </div>
                                <div class="details">
                                    @php
                                    $sevenallgetpost=App\NewsPost::where('is_deleted',0)->where('status',1)->OrderBy('id','DESC')->where('cate_id',$sevencate->id)->skip(1)->limit(8)->get();
                                    @endphp
                                    @foreach($sevenallgetpost as $post)
                                    <div class="media" style="padding: 16px 0px;">
                                        <div class="media-left">
                                            <a href="#">
                                                <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                                    data-src="{{asset('public/uploads/newspost/small/'.$post->image)}}"
                                                    alt="" class="lazy w-100">

                                                @if($post->post_type==2)
                                                <a href="#" class="play-button">
                                                    <i class="fas fa-play"></i>
                                                </a>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="media-body" style="margin-left:10px ;">
                                            <h4 class="media-heading">
                                                <a href="#">
                                                    {{Str::limit($post->title,40)}}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>


                            </div>
                            <div class="allnews">
                                <a href="#">Read More</a>
                            </div>
                        </div>

                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
<!-- nation part end -->

<!-- ad part end -->
<!--boxnews part-->
<section id="box_news">
    <div class="container">
        <div class="row">
            @if($eightcate)
            <div class="col-sm-3">
                <div class="single-cat-height">
                    <div class="live-heading">
                        <h4 class="catTitle">
                            <a href="#">{{$eightcate->name}}</a>
                            <div class="liner"></div>

                        </h4>
                    </div>
                    <div class="single-block">
                        <div class="image_box">
                            @php
                            $eightnewspost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$eightcate->id)->OrderBy('id','DESC')->first();
                            @endphp
                            @if($eightnewspost)
                            <a href="#">
                                <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                    data-src="{{asset('public/uploads/newspost/bigthum/'.$eightnewspost->image)}}"
                                    alt="" class="lazy w-100">
                            </a>
                            <h4 style="padding: 10px 15px 0px 15px;">{{Str::limit($eightnewspost->title,40)}}</h4>
                            @endif

                        </div>
                        <div class="details">
                            @php
                            $eightallnewspost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$eightcate->id)->OrderBy('id','DESC')->skip(1)->limit(4)->get();
                            @endphp
                            @foreach($eightallnewspost as $post)
                            <div class="media">
                                <div class="media-body" style="margin-left:0px ;">
                                    <h4 class="media-heading">
                                        <a href="#">
                                            {{ Str::limit($post->title,40)}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach

                        </div>


                    </div>
                </div>
                <div class="allnews">
                    <a href="#">
                        All News
                    </a>

                </div>
            </div>
            @endif

            @if($ninecate)
            <div class="col-sm-3">
                <div class="single-cat-height">
                    <div class="live-heading">
                        <h4 class="catTitle">
                            <a href="#">{{$ninecate->name}}</a>
                            <div class="liner"></div>

                        </h4>
                    </div>
                    <div class="single-block">
                        <div class="image_box">
                            @php
                            $eightnewsspost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$ninecate->id)->OrderBy('id','DESC')->first();
                            @endphp
                            @if($eightnewsspost)
                            <a href="#">
                                <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                    data-src="{{asset('public/uploads/newspost/bigthum/'.$eightnewspost->image)}}"
                                    alt="" class="lazy w-100">
                            </a>
                            <h4 style="padding: 10px 15px 0px 15px;">{{Str::limit($eightnewsspost->title,40)}}</h4>
                            @endif

                        </div>
                        <div class="details">
                            @php
                            $eightallnewspost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$ninecate->id)->OrderBy('id','DESC')->skip(1)->limit(4)->get();
                            @endphp
                            @foreach($eightallnewspost as $post)
                            <div class="media">
                                <div class="media-body" style="margin-left:0px ;">
                                    <h4 class="media-heading">
                                        <a href="#">
                                            {{ Str::limit($post->title,40)}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach

                        </div>


                    </div>
                </div>
                <div class="allnews">
                    <a href="#">
                        All News
                    </a>

                </div>
            </div>
            @endif

            @if($tencate)
            <div class="col-sm-3">
                <div class="single-cat-height">
                    <div class="live-heading">
                        <h4 class="catTitle">
                            <a href="#">{{$tencate->name}}</a>
                            <div class="liner"></div>

                        </h4>
                    </div>
                    <div class="single-block">
                        <div class="image_box">
                            @php
                            $tennewsspost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$tencate->id)->OrderBy('id','DESC')->first();
                            @endphp
                            @if($tennewsspost)
                            <a href="#">
                                <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                    data-src="{{asset('public/uploads/newspost/bigthum/'.$eightnewspost->image)}}"
                                    alt="" class="lazy w-100">
                            </a>
                            <h4 style="padding: 10px 15px 0px 15px;">{{Str::limit($tennewsspost->title,40)}}</h4>
                            @endif

                        </div>
                        <div class="details">
                            @php
                            $tenallnewspost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$tencate->id)->OrderBy('id','DESC')->skip(1)->limit(4)->get();
                            @endphp
                            @foreach($tenallnewspost as $post)
                            <div class="media">
                                <div class="media-body" style="margin-left:0px ;">
                                    <h4 class="media-heading">
                                        <a href="#">
                                            {{ Str::limit($post->title,40)}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach

                        </div>


                    </div>
                </div>
                <div class="allnews">
                    <a href="#">
                        All News
                    </a>

                </div>
            </div>
            @endif

            @if($elevencate)
            <div class="col-sm-3">
                <div class="single-cat-height">
                    <div class="live-heading">
                        <h4 class="catTitle">
                            <a href="#">{{$elevencate->name}}</a>
                            <div class="liner"></div>

                        </h4>
                    </div>
                    <div class="single-block">
                        <div class="image_box">
                            @php
                            $elevennewsspost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$elevencate->id)->OrderBy('id','DESC')->first();
                            @endphp
                            @if($elevennewsspost)
                            <a href="#">
                                <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                    data-src="{{asset('public/uploads/newspost/bigthum/'.$eightnewspost->image)}}"
                                    alt="" class="lazy w-100">
                            </a>
                            <h4 style="padding: 10px 15px 0px 15px;">{{Str::limit($elevennewsspost->title,40)}}</h4>
                            @endif

                        </div>
                        <div class="details">
                            @php
                            $tenallnewspost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$elevencate->id)->OrderBy('id','DESC')->skip(1)->limit(4)->get();
                            @endphp
                            @foreach($tenallnewspost as $post)
                            <div class="media">
                                <div class="media-body" style="margin-left:0px ;">
                                    <h4 class="media-heading">
                                        <a href="#">
                                            {{ Str::limit($post->title,40)}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach

                        </div>


                    </div>
                </div>
                <div class="allnews">
                    <a href="#">
                        All News
                    </a>

                </div>
            </div>
            @endif



        </div>
    </div>
</section>
<!--boxnews part-->
<!-- entertainment part start -->
@if($twelevecate)
<section id="sport_main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 main_content">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="left">
                            <span class="cat_name">
                                <a href="#">{{$twelevecate->name}}</a>
                            </span>
                            <span class="cat_subname">
                                @php
                                $suba=App\SubCategory::where('is_deleted',0)->where('status',1)->where('cate_id',$twelevecate->id)->OrderBy('id','DESC')->get();
                                @endphp
                                @foreach($suba as $sub)
                                <a href="{{$sub->id}}">{{$sub->name}}</a>
                                @endforeach

                            </span>
                        </h4>

                    </div>
                    <div class="col-sm-4 text-right">
                        <span class="news">
                            <a href="#">All News <i class="fas fa-angle-double-right"></i></a>

                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @php
            $newspost=App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$twelevecate->id)->OrderBy('id','DESC')->limit(8)->get();
            @endphp
            @foreach($newspost as $post)
            <div class="col-sm-3">
                <div class="image_box2 main_box2" style="background-color: #fff;">
                    <div class="main_image">
                        <a href="#">
                            <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                data-src="{{asset('public/uploads/newspost/bigthum/'.$eightnewspost->image)}}" alt=""
                                class="lazy w-100">
                            @if($post->post_type==2)
                            <a href="#" class="play-button">
                                <i class="fas fa-play"></i>
                            </a>
                            @endif
                        </a>

                    </div>
                    <div class="detail_box2">
                        <h4>{{Str::limit($post->title,45)}}</h4>

                    </div>
                    <div class="meta3">
                        <span class="pull-left tags">
                            <i class="fas fa-tags"></i>
                            <a href="#">বিস্তারিত</a>
                        </span>

                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif
<!-- entertainment part end -->
<!-- boxnews part start -->
<!--  <section id="box_news">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="single-cat-height">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">Health</a>
                                <div class="liner"></div>
                            </h4>
                        </div>
                        <div class="single-block">
                            <div class="image_box">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/mal-01-20200224205835.webp" alt="image" class="w-100">
                                </a>
                                <h4 style="padding: 10px 15px 0px 15px;">Lorem ipsum dolor sit, amet consectetur
                                    adipisicing.</h4>

                            </div>
                            <div class="details">
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="allnews">
                        <a href="#">
                            All News
                        </a>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-cat-height">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">
                                    Study
                                </a>
                                <div class="liner"></div>
                            </h4>
                        </div>
                        <div class="single-block">
                            <div class="image_box">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/mukh-1-20200226121155.webp" alt="image" class="w-100">
                                </a>
                                <h4 style="padding: 10px 15px 0px 15px;">Lorem ipsum dolor sit, amet consectetur
                                    adipisicing.</h4>

                            </div>
                            <div class="details">
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="allnews">
                        <a href="#">
                            All News
                        </a>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-cat-height">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">
                                    Dicipline
                                </a>
                                <div class="liner"></div>
                            </h4>
                        </div>
                        <div class="single-block">
                            <div class="image_box">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/m-m-akas-01-20200225190157.webp" alt="image" class="w-100">
                                </a>
                                <h4 style="padding: 10px 15px 0px 15px;">Lorem ipsum dolor sit, amet consectetur
                                    adipisicing.</h4>

                            </div>
                            <div class="details">
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="allnews">
                        <a href="#">
                            All News
                        </a>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-cat-height">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">
                                    Meeting
                                </a>
                                <div class="liner"></div>
                            </h4>
                        </div>
                        <div class="single-block">
                            <div class="image_box">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/india-cover-20200226095139.webp" alt="image" class="w-100">
                                </a>
                                <h4 style="padding: 10px 15px 0px 15px;">Lorem ipsum dolor sit, amet consectetur
                                    adipisicing.</h4>

                            </div>
                            <div class="details">
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="allnews">
                        <a href="#">
                            All News
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!-- boxnews part end-->
<!-- important Report start -->
<section id="report_main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 main_content">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="live-heading">
                            <h4 class="catTitle">

                                <a href="#">Important Report</a>
                                <div class="liner"></div>
                            </h4>
                        </div>


                    </div>
                    <div class="col-sm-2 text-right">
                        <span class="news">
                            <a href="#">All News <i class="fas fa-angle-double-right"></i></a>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @php
            $pocketnews=App\NewsPost::where('is_deleted',0)->where('status',1)->where('pocket_news',1)->OrderBy('id','DESC')->limit(8)->get();
            @endphp
            @foreach($pocketnews as $post)
            <div class="col-sm-3">
                <div class="image_box2 main_box2" style="background-color: #fff;">
                    <div class="main_image">
                        <a href="#">
                            <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                data-src="{{asset('public/uploads/newspost/bigthum/'.$post->image)}}" alt=""
                                class="lazy w-100">
                            @if($post->post_type==2)
                            <a href="#" class="play-button">
                                <i class="fas fa-play"></i>
                            </a>
                            @endif
                        </a>

                    </div>
                    <div class="detail_box2">
                        <h4>{{Str::limit($post->title,40)}}</h4>
                    </div>
                    <div class="meta3">
                        <span class="pull-left tags">
                            <i class="fas fa-tags"></i>
                            <a href="#">বিস্তারিত</a>
                        </span>

                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>

</section>
<!-- important Report end -->
<!-- boxnews part start -->
<!--   <section id="box_news">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="single-cat-height">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">Health</a>
                                <div class="liner"></div>
                            </h4>

                        </div>
                        <div class="single-block">
                            <div class="image_box">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/mal-01-20200224205835.webp" alt="image" class="w-100">
                                </a>
                                <h4 style="padding: 10px 15px 0px 15px;">Lorem ipsum dolor sit, amet consectetur
                                    adipisicing.</h4>

                            </div>
                            <div class="details">
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="allnews">
                        <a href="#">
                            All News
                        </a>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-cat-height">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">Religion</a>
                                <div class="liner"></div>
                            </h4>
                        </div>
                        <div class="single-block">
                            <div class="image_box">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/mukh-1-20200226121155.webp" alt="image" class="w-100">
                                </a>
                                <h4 style="padding: 10px 15px 0px 15px;">Lorem ipsum dolor sit, amet consectetur
                                    adipisicing.</h4>

                            </div>
                            <div class="details">
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="allnews">
                        <a href="#">
                            All News
                        </a>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-cat-height">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">
                                    Philosophy
                                </a>
                                <div class="liner"></div>
                            </h4>
                        </div>
                        <div class="single-block">
                            <div class="image_box">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/m-m-akas-01-20200225190157.webp" alt="image" class="w-100">
                                </a>
                                <h4 style="padding: 10px 15px 0px 15px;">Lorem ipsum dolor sit, amet consectetur
                                    adipisicing.</h4>

                            </div>
                            <div class="details">
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="allnews">
                        <a href="#">
                            All News
                        </a>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-cat-height">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">Version language</a>
                                <div class="liner"></div>
                            </h4>
                        </div>
                        <div class="single-block">
                            <div class="image_box">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/india-cover-20200226095139.webp" alt="image" class="w-100">
                                </a>
                                <h4 style="padding: 10px 15px 0px 15px;">Lorem ipsum dolor sit, amet consectetur
                                    adipisicing.</h4>

                            </div>
                            <div class="details">
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body" style="margin-left:0px ;">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                Lorem ipsum dolor sit. Lorem ipsum dolor sit.
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="allnews">
                        <a href="#">
                            All News
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!-- boxnews part end-->
<!-- photo gallery start -->
<section id="photo_gallary">
    <div class="container">

        <div class="row">
            <div class="col-sm-8">
                <div class="live-heading">
                    <h4 class="catTitle">
                        <a href="#">ফটোগ্যালেরি</a>

                        <div class="liner"></div>
                    </h4>

                </div>
                <div class="photo_gallary owl-carousel owl-theme">
                    @if ($slideGalleries)
                    @foreach ($slideGalleries as $slideGallery)
                    <div class="item">
                        <div class="item_image">
                            <a href="{{ route('website.gallery.details', $slideGallery->slug) }}">
                                <img src="{{asset('public/uploads/gallery/thumbnail/'.$slideGallery->thumbnail_photo)}}"
                                    alt="">
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">সর্বশেষ</a>

                                <div class="liner"></div>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="row single-media">
                    <div class="col-sm-12">
                        <div class="media-list">
                            @foreach ($latestNewsPosts as $latestNewsPost)
                            <div class="media">
                                <div class="media-left">
                                    <a @if($latestNewsPost->post_type==2) href="{{url('/videodetails/'.$latestNewsPost->slug.'/'.$latestNewsPost->id)}}" @else href="{{url('details/'.$latestNewsPost->slug.'/'.$latestNewsPost->id)}}" @endif>
                                        <img src="{{asset('public/website/')}}/images/lazy_loader.png"
                                                data-src="{{asset('public/uploads/newspost/small/'.$latestNewsPost->image)}}"
                                                alt="" class="lazy img-fluid">
                                        @if($latestNewsPost->post_type == 2)
                                        <a class="play-button-latest" @if($latestNewsPost->post_type == 2) href="{{url('/videodetails/'.$latestNewsPost->slug.'/'.$latestNewsPost->id)}}" @else href="{{url('details/'.$latestNewsPost->slug.'/'.$latestNewsPost->id)}}" @endif class="play-button">
                                            <i class="fas fa-play"></i>
                                        </a>
                                        @endif
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="photo">
                                        <a @if($latestNewsPost->post_type==2) href="{{url('/videodetails/'.$latestNewsPost->slug.'/'.$latestNewsPost->id)}}" @else href="{{url('details/'.$latestNewsPost->slug.'/'.$latestNewsPost->id)}}" @endif>{{ $latestNewsPost->title }}</a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- photo gallery end -->

<!-- ad part end -->


<script>
    $(document).ready(function () {
        // district
        $('select[name="division_id"]').on('change', function () {
            var division_id = $(this).val();
            //alert(division_id);
            if (division_id) {
                $.ajax({
                    url: "{{  url('/news/getdistrict/') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {

                        $('#district_id').empty();
                        $('#district_id').append(' <option  value="">জেলা</option>');
                        $.each(data, function (index, districtObj) {
                            $('#district_id').append('<option value="' + districtObj.id + '">' + districtObj.name_bn + '</option>');
                        });
                    }
                });
            } else {
                //alert('danger');
            }

        });

        // subdistrict

        $('select[name="district_id"]').on('change', function () {
            var district_id = $(this).val();
            //alert("success");
            if (district_id) {
                $.ajax({
                    url: "{{  url('/news/getsubdistrict/') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#subdistrict_id').empty();
                        $('#subdistrict_id').append(' <option  value="">উপজেলা</option>');
                        $.each(data, function (index, districtObj) {
                            $('#subdistrict_id').append('<option value="' + districtObj.id + '">' + districtObj.name + '</option>');
                        });
                    }
                });
            } else {
                //alert('danger');
            }

        });
    });
</script>
@endsection
