@extends('website.master')
@section('content')

@if(count($newsposts) > 0)
<section id="national">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb no-margin">
                        <li class="breadcrumb-item"><a href="#">
                                <i class="fas fa-home text-danger"></i>
                            </a></li>
                        <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">
                            {{$slug}}</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 main-content">

                @foreach($newsposts as $news)
                @if($loop->index == 0)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single-block-national">
                                <!-- <div class="row">
                                    <div class="col-sm-8">
                                        <div class="img_box">
                                            <a href="#">
                                                <img class="w-100" src="images/afridi-20200225095919.webp" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-left">
                                        <div class="img_cont_national">
                                            <h4>Lorem ipsum dolor sit amet consectetur.</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum at
                                                dicta totam cumque natus quas itaque reiciendis quasi enim saepe!</p>
                                        </div>
                                    </div>
                                </div> -->


                                
                                
                                <div class="img_box">
                                    <a href="@if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('/details')}}/{{$news->slug}}/{{$news->id}} @endif">
                                        <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/mediumthum/'.$news->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="">

                                         @if($news->post_type==2)
                                             <a href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" class="play-button">
                                                <i class="fas fa-play"></i>
                                            </a>
                                            @endif
                                    </a>
                                    <div class="img_cont_national">
                                    <a @if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('/details')}}/{{$news->slug}}/{{$news->id}} @endif"><h4>{{$news->title}}
                                            </h4></a>
                                        <p>{!! Str::limit($news->description,150) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box_block">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="img-box">
                                        <a href="@if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('/details')}}/{{$news->slug}}/{{$news->id}} @endif">
                                            <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/mediumthum/'.$news->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="">
                                            <a href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" class="play-button">
                                                <i class="fas fa-play"></i>
                                            </a>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="img_cont_national_box">
                                            <h4>
                                            
                                            <a href="@if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('/details')}}/{{$news->slug}}/{{$news->id}} @endif"                                                   style="text-decoration: none;color: #000;font-size: 16px;font-weight: 600;">{{$news->title}}</a>
                                            </h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif
                @endforeach


                {{ $newsposts->links() }}

                    <!-- <div class="row mt-3">
                        <div class="col-sm-12 text-center">
                            <div class="read">
                                <a href="#"></a>
                            </div>
                        </div>
                    </div> -->

                </div>

                <div class="col-sm-4 aside">
                    <!-- ad part -->
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="ad-part">
                                <a href="#">
                                    <img src="images/18139811246520163431.jpg" class="w-100" alt="no-image">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- aside box -->
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <div class="heading-national text-left">
                                <h4 class="back-title">
                                    <span class="eee">Populer- {{$slug}}</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="row thumbnail">









                  

                        <div class="col-sm-12">
                
                            <div class="detail_thumb">
                                <div class="thumb-first">
                                <a @if($news->post_type==2) href="{{url('/videodetails/'.$propolerpostsbig->slug.'/'.$propolerpostsbig->id)}}" @else href="{{url('/details')}}/{{$propolerpostsbig->slug}}/{{$propolerpostsbig->id}} @endif">
                                        
                                        <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/mediumthum/'.$propolerpostsbig->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="">
                                        @if($news->post_type==2)
                                             <a href="{{url('/videodetails/'.$propolerpostsbig->slug.'/'.$propolerpostsbig->id)}}" class="play-button">
                                                <i class="fas fa-play"></i>
                                            </a>
                                            @endif
                                    </a>
                                    <h4>
                                    <a @if($news->post_type==2) href="{{url('/videodetails/'.$propolerpostsbig->slug.'/'.$propolerpostsbig->id)}}" @else href="{{url('/details')}}/{{$propolerpostsbig->slug}}/{{$propolerpostsbig->id}} @endif">{{$propolerpostsbig->title}}</a>
                                    </h4>
                                </div>

                            </div>


                        

                            <div class="sub_thumb">

                                <div class="row">



                                    @foreach($propolerpostssmall as $news)
                                    <div class="col-sm-6">
                                        <div class="small-thumb">
                                        <a @if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('/details')}}/{{$news->slug}}/{{$news->id}} @endif">
                                            <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/mediumthum/'.$news->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="">
                                            @if($news->post_type==2)
                                             <a href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" class="play-button">
                                                <i class="fas fa-play"></i>
                                            </a>
                                            @endif
                                            </a>
                                            <h4>
                                                <a @if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('/details')}}/{{$news->slug}}/{{$news->id}} @endif">{{$news->title}}</a>
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
                            <!-- tabs part -->
                            <div class="row mt-4">
                                <div class="col-sm-12 news_list nt">
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


                                    <div class="tab-content nav-detail" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <ul class="media-list">

                                            

                                                <li class="media">
                                                    <div class="media-left">
                                                        <span>1</span>
                                                        <a href="#">
                                                            <img src="images/ashraful-20200225104941.jpg"
                                                                alt="no-image">
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
                                                        <span>1</span>
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
                                                        <span>2</span>
                                                        <a href="#">
                                                            <img src="images/samira-01-20200226132030.webp"
                                                                alt="no-image">
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
                                                        <span>3</span>
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
                                                        <span>4</span>
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
                                                        <span>5</span>
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
                                                        <span>7</span>
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
                            <!-- today news -->
                            <div class="row">
                                <div class="col-sm-12 p-0 text-center">
                                    <div class="td_news">
                                        <a href="#">
                                            Today's News
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
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
   
@else

<section id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-justify">
                    <div class="news-about">
                        <p> No Data Found on This Category!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

@endif
    @endsection