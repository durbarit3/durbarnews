@extends('website.master')
@section('content')


 <section id="national">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb no-margin">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">
                                <i class="fas fa-home text-danger"></i>
                            </a></li>
                        <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">{{$dis->division->name_bn}}</li>

                        <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">{{$dis->district->name_bn}}</li>
                        <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">{{$dis->name}}</li>
                    </ol>
                </div>
            </div>
          <div class="row">
              <div class="col-sm-12">
                  <h1 class="map_icon"><i class="fas fa-map-marker-alt"></i> {{$dis->name}} </h1>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
             
              </div>
          </div>
           @php
                $news=App\NewsPost::where('subdistrict_id',$dis->id)->OrderBy('id','DESC')->first();
            @endphp
             
            <div class="row">
                <div class="col-sm-8 main-content">
                     @if($news)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single-block-national">
                                <div class="row">
                                   
                                  
                                    <div class="col-sm-8">
                                        
                                        <div class="img_box">
                                            <a href="#">
                                                <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/bigthum/'.$news->image)}}" alt=""class="lazy w-100">
                                                @if($news->post_type==2)
                                                         <a @if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('details/'.$news->slug.'/'.$news->id)}}" @endif class="play-button">
                                                            <i class="fas fa-play"></i>
                                                        </a>
                                                @endif

                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-sm-4 p-0 text-left">
                                        <div class="img_cont_national">
                                            <h4><a @if($news->post_type==2) href="{{url('/videodetails/'.$news->slug.'/'.$news->id)}}" @else href="{{url('details/'.$news->slug.'/'.$news->id)}}" @endif style="text-decoration: none;color: #000;">{{Str::limit($news->title,40)}}</a></h4>
                                            <p>{!! Str::limit($news->description,100) !!}</p>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row paddingtop">
                        @php
                            $relatedpost=App\NewsPost::where('subdistrict_id',$dis->id)->OrderBy('id','DESC')->Simplepaginate(10);
                        @endphp
                        @foreach($relatedpost as $rpost)
                        <div class="col-sm-6">
                            <div class="single-block-n">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="img_box_n">
                                            <a @if($rpost->post_type==2) href="{{url('/videodetails/'.$rpost->slug.'/'.$rpost->id)}}" @else href="{{url('details/'.$rpost->slug.'/'.$rpost->id)}}" @endif>
                                               <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/bigthum/'.$news->image)}}" alt=""class="lazy w-100">
                                                @if($rpost->post_type==2)
                                                         <a @if($rpost->post_type==2) href="{{url('/videodetails/'.$rpost->slug.'/'.$rpost->id)}}" @else href="{{url('details/'.$rpost->slug.'/'.$rpost->id)}}" @endif class="play-button">
                                                            <i class="fas fa-play"></i>
                                                        </a>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="image_cont_n">
                                            <p>
                                             <a href="#">{{Str::limit($rpost->title,40)}}</a>   
                                        </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12 text-center">
                            <div class="read">
                               {{$relatedpost->links()}}
                            </div>
                        </div>
                    </div>
                    @else
                        <p style="color: red"> No Data Found</p>
                    @endif
                </div>
               
                <div class="col-sm-4 aside">


                    <div class="row">
                        <div class="col-sm-12">
                            <!-- tabs part -->
                            <div class="row mt-4">
                                
                            </div>
                            <!-- today news -->
                            <div class="row">
                               
                            </div>

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


@endsection