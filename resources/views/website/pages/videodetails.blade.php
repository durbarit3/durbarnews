@extends('website.master',['title' => $videopost->title, 'description' => $videopost->description,'keyword' => $videopost->meta_tag ])
@section('content')
<!-- ad section end -->
 @section('meta')
        <meta property="og:url"           content="{{URL::current()}}"/>
        <meta property="og:type"          content="website"/>
        <meta property="og:title"         content="{{$videopost->title}}}"/>
        <meta property="og:description"   content="{!! $videopost->description !!}"/>
        <meta property="og:image"         content="{{asset('public/uploads/newspost/bigthum/'.$videopost->image)}}" />
@endsection

    <section id="ad" style="padding: 10px 0px;">
        <div class="container">
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
    <section id="video">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb no-margin" style="background: #fff;">
                        <li class="breadcrumb-item"><a href="#">
                                <i class="fas fa-home text-danger" style="position: relative;bottom:1px;"></i>
                            </a></li>
                        <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">
                            খবর</li>

                    </ol>
                </div>
            </div>
            <div class="video-part">
                <div class="row">
                    <div class="col-sm-8 main-content">
                        <div class="embed-responsive embed-responsive-16by9">
                            <figure class="content-media content-media-video" id="featured-media">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/M2Zw8Bwa9Es"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </figure>
                        </div>
                        <div class="video-heading">
                            <h3>{{$videopost->title}}</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <span class="small text-muted">
                                        <i class="far fa-clock text-danger"></i>
                                        ০৩:০১ পিএম, ০৯ মার্চ ২০২০
                                    </span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <div class="social_media_share">
                                        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5e76fe9c2cf6370012207869&product=inline-share-buttons" async="async"></script>
                                        <ul>
                                             <div class="sharethis-inline-share-buttons"></div>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="describe">
                                        <p>{!! $videopost->description !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	@foreach($video as $post)
                                <div class="col-sm-3">
                                    <div class="live_heading" style="background-color: transparent;padding:0px;">
                                        <div class="single_video_first">
                                            <div class="main_video_box">
                                                <div class="video_box mt-3">
                                                    <a href="#">

                                                     <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/bigthum/'.$post->image)}}" alt=""class="lazy img-fluid">

			                                            @if($post->post_type==2)
			                                             <a href="{{url('/videodetails/'.$post->slug.'/'.$post->id)}}" class="play-button">
			                                                <i class="fas fa-play"></i>
			                                            </a>
			                                            @endif
                                                    </a>

                                                </div>
                                                <span class="badge-main">খবর</span>
                                                <h2 style="font-size: 10px;margin-top:5px">
                                                    <a href="#" class="video-caption">
                                                        {{Str::limit($post->title,25)}}
                                                    </a>
                                                </h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach


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
                                	@foreach($braking as $post)
                                    <div class="media">
                                        <div class="media_left">
                                            <a href="#">
                                                <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/small/'.$post->image)}}" alt=""class="lazy img-fluid">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="#" class="media-heading">
                                                {{$post->title}}
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
            <!-- ad part start -->

            <div class="row">
                <div class="col-sm-8 offset-2">
                    <div class="ad-part">
                        <a href="#">
                            <img src="images/3325802211444676497.jpg" class="w-100" alt="no-image">
                        </a>
                    </div>
                </div>
            </div>

            <!-- ad part end -->
            <div class="row mt-5">
                <div class="col-sm-12">
                    <h2 class="catTitle">
                        <span>খবর </span>
                        <div class="liner"></div>
                    </h2>
                    <div class="video-caousel">
                        <div class="video_gallary owl-carousel owl-theme">
                        	@foreach($allnews as $post)
                            <div class="item">
                                <div class="main_video_box">
                                    <div class="video_box mt-3">
                                        <a href="#">
                                             <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/mediumthum/'.$post->image)}}" alt=""class="lazy img-fluid">

                                             @if($post->post_type==2)
                                             <a href="{{url('/videodetails/'.$post->slug.'/'.$post->id)}}" class="play-button">
                                                <i class="fas fa-play"></i>
                                            </a>
                                            @endif
                                        </a>

                                    </div>
                                  
                                    <h2 style="font-size: 10px;margin-top:5px">
                                        <a @if($post->post_type==2) href="{{url('/videodetails/'.$post->slug.'/'.$post->id)}}" @else href="#" @endif class="video-caption">
                                           {{Str::limit($post->title,45)}}
                                        </a>
                                    </h2>
                                </div>
                                
                            </div>
                            @endforeach
                      
    
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- ad part start -->

            <div class="row" style="padding: 20px 0px;">
                <div class="col-sm-8 offset-2">
                    <div class="ad-part">
                        <a href="#">
                            <img src="images/BG.jpg" class="w-100" alt="no-image">
                        </a>
                    </div>
                </div>
            </div>

            <!-- ad part end -->
           <!--  <div class="row">
                <div class="col-sm-12">
                    <h2 class="catTitle">
                        <span>পডকাস্ট </span>
                        <div class="liner"></div>
                    </h2>
                    <div class="video-caousel">
                        <div class="video_gallary owl-carousel owl-theme">
                            <div class="item">
                                <div class="main_video_box">
                                    <div class="video_box mt-3">
                                        <a href="#">
                                            <img src="images/youtube-frame-final-recovered-recovered-20200225145050.jpg"
                                                class="w-100" alt="">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>

                                    </div>
                                  
                                    <h2 style="font-size: 10px;margin-top:5px">
                                        <a href="#" class="video-caption">
                                            দেশে করোনা শনাক্তের পরই বাড়ল মাস্কের দাম | ০৯ মার্চ ২০২০
                                        </a>
                                    </h2>
                                </div>
                                
                            </div>
                            <div class="item">
                                <div class="main_video_box">
                                    <div class="video_box mt-3">
                                        <a href="#">
                                            <img src="images/youtube-frame-final-recovered-recovered-20200225145050.jpg"
                                                class="w-100" alt="">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>

                                    </div>
                                  
                                    <h2 style="font-size: 10px;margin-top:5px">
                                        <a href="#" class="video-caption">
                                            দেশে করোনা শনাক্তের পরই বাড়ল মাস্কের দাম | ০৯ মার্চ ২০২০
                                        </a>
                                    </h2>
                                </div>
                                
                            </div>
    
                        </div>
                    </div>
                </div>
                
            </div> -->
        </div>
    </section>
  @endsection