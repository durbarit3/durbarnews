@extends('website.master')
@section('content')


 <section id="national">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb no-margin">
                        <li class="breadcrumb-item"><a href="#">
                                <i class="fas fa-home text-danger"></i>
                            </a></li>
                        <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">{{$dis->division->name_bn}}</li>
                        <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">{{$dis->name_bn}}</li>
                    </ol>
                </div>
            </div>
          <div class="row">
              <div class="col-sm-12">
                  <h1 class="map_icon"><i class="fas fa-map-marker-alt"></i> {{$dis->name_bn}}</h1>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div class="content_tags">
                    @php
                        $subdis=App\SubDistrict::where('district_id',$dis->id)->get();
                    @endphp
                      <ul>
                        @foreach($subdis as $sub)
                          <li><a href="{{url('subdistrict/news/map/news/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                  </div>
              </div>
          </div>
           @php
                   $news=App\NewsPost::where('district_id',$dis->id)->OrderBy('id','DESC')->first();
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
                            $relatedpost=App\NewsPost::where('district_id',$dis->id)->OrderBy('id','DESC')->Simplepaginate(10);
                        @endphp
                        @foreach($relatedpost as $rpost)
                        <div class="col-sm-6" style="padding: 10px">
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
               
                

                     @include('website.include.sidenews')
                    
                
            </div>
        </div>

    </section>


@endsection