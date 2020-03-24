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
                                        <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/bigthum/'.$news->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="">

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
                                            <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/bigthum/'.$news->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="">
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
                @include('website.include.sidenews')


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
                            <img src="{{asset('public/website/')}}/images/3325802211444676497.jpg" class="w-100" alt="no-image">
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