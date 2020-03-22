@extends('website.master')
@section('content')
<!-- ad section end -->
<section id="national">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 main-content">
                <div class="row">
                    <div class="col-sm-12">
                        <article class="box-white">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">
                                        <i class="fas fa-home text-danger"></i>
                                    </a></li>
                                @php
                                $cate = App\Category::where('id',$news->cate_id)->first();
                                @endphp

                                <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">
                                    @if($cate)
                                    <a href="{{url('/')}}/{{$cate->name}}">{{$cate->name}}
                                        @endif
                                    </a>

                                    @if($news->subcategory_id)
                                    @php
                                $subcate = App\SubCategory::where('id',$news->subcategory_id)->first();
                                @endphp
                                <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">
                                    @if($cate)
                                    <a href="{{url('/')}}/{{$cate->name}}">{{$subcate->name}}
                                        @endif
                                    </a>


                                </li>
                                @endif


                            </ol>
                            <h3 class="no-margin">
                                <a href="#" style="text-decoration: none;color: #000;font-size: 24px;">
                                    {{$news->title}}
                                </a>
                            </h3>
                            <div class="dividerDetails"></div>
                            <blockquote class="no-margin no-padding">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="media">
                                            <div class="media_left">

                                                
                                            </div>
                                            <div class="media-body">
                                                <span class="small text-muted">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <a href="#" class="visible-print-view">নিজস্ব প্রতিবেদক</a>
                                                    <br>

                                                    <i class="far fa-clock text-danger"></i>

                                                    @php
                                                        $date =$news->created_at->diffForHumans();
                                                    @endphp
                                                    প্রকাশিত: {{Bengali::bn_date_time($date)}}
                                                   
                                                    
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                        <div class="hidden-print">
                                            <div class="social_share">
                                                <div class="social_share_count pull-left text-center" style="font-weight: 600;font-size: 14px;">
                                                    <span class="custom_num" style="font-size: 20px;color:rgb(58, 0, 0);">49</span>
                                                    <br>
                                                    <span class="share_word">SHARE</span>
                                                </div>
                                                <div class="social_media_share">
                                                    <ul>
                                                        <li>
                                                            <button type="button" class="facebook"><i class="fab fa-facebook-f"></i></button>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="twitter"><i class="fab fa-twitter"></i></button>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="whatsapp"><i class="fab fa-whatsapp"></i></button>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="print"> <i class="fas fa-print"></i></button>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                            <div class="padding_top">
                                <div class="featured_image">
                                <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/bigthum/'.$news->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="" style="width:40px;height:auto;display:inline-block;">
                                </div>
                                <span class="caption">file image</span>
                            </div>
                            <div class="content_details">
                                <P>{!! $news->description !!}</P>

                                
                            </div>
                            <div class="photo_tag">
                                <ul>
                                    <li><i class="fas fa-tags"></i></li>
                                    <li><a href="#">{{$news->meta_tag}}</a></li>
                                </ul>
                            </div>
                            <!-- ad part -->
                            <div class="ad_main">
                                <a href="{{url('/details')}}/{{$news->slug}}/{{$news->id}}">
                                    <img src="images/15798962006367364458.gif" class="w-100" alt="">

                                </a>
                            </div>
                        </article>
                    </div>
                </div><br>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="heading-national text-left">
                            <h4 class="back-title">
                                <span class="eee">Latest News</span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">


                    @foreach($letestnews as $news)

                    <div class="col-sm-3">
                        <div class="image_box2 main_box2" style="background-color: #fff;">
                            <div class="main_image">
                                <a href="{{url('/details')}}/{{$news->slug}}/{{$news->id}}">
                                    <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/bigthum/'.$news->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="" style="width:40px;height:auto;display:inline-block;">
                                </a>

                            </div>
                            <div class="detail_box2">
                                <span><a href="{{url('/details')}}/{{$news->slug}}/{{$news->id}}" style="text-decoration: none;color: #000;font-weight: 600;font-size: 14px;">{{Str::limit($news->title,30)}}</a></span>
                            </div>
                            <div class="meta3">
                                <span class="pull-left tags">

                                    <a href="#">lorem</a>
                                </span>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    @endforeach



                </div>
                <!-- ad part -->
                <div class="ad_main" style="margin-bottom: 20px;">
                    <a href="#">
                        <img src="images/151674789127677130.png" class="w-100" alt="">

                    </a>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="heading-national text-left">
                            <h4 class="back-title">
                                <span class="eee">Popular News</span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">











                    @foreach($propolerposts as $news)

                    <div class="col-sm-3">
                        <div class="image_box2 main_box2" style="background-color: #fff;">
                            <div class="main_image">
                                <a href="#">
                                    <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/smallthum/'.$news->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="" style="width:40px;height:auto;display:inline-block;">
                                </a>

                            </div>
                            <div class="detail_box2">
                                <span><a href="{{url('/details')}}/{{$news->slug}}/{{$news->id}}" style="text-decoration: none;color: #000;font-weight: 600;font-size: 14px;">{{Str::limit($news->title,30)}}</a></span>

                            </div>
                            <div class="meta3">
                                <span class="pull-left tags">

                                    <a href="#">lorem</a>
                                </span>

                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    @endforeach



                </div>


            </div>


            <aside class="col-sm-4">

            <!-- letest news area start -->

                @if($cate)

                <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="side_box">
                                <div class="heading-national text-left">
                                    <h4 class="back-title">
                                        <span class="eee">Latest- {{$cate->name}}</span>
                                    </h4>
                                </div>
                                <div class="single-block">
                                    <div class="details with-icon">

                                    @foreach($letestnews as $row)
                                        <div class="media">
                                            <h4 class="media-body">
                                                <h4 class="media_heading_box">
                                                    <a href="{{url('/details')}}/{{$row->slug}}/{{$row->id}}">
                                                        <i class="fas fa-angle-double-right"></i>
                                                        <h4>{{Str::limit($row->title,80)}}</h4>
                                                    </a>
                                                </h4>
                                        </div>
                                        @endforeach
                                      
                                        


                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>














             
                @else

                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="heading-national text-left">
                            <h4 class="back-title">
                                <span class="eee">Popular News</span>
                            </h4>
                        </div>
                    </div>

                    <div class="media">
                        <h4 class="media-body">
                            <h4 class="media_heading_box">
                                <a href="#">

                                    <h4>No Popular News Found On This Category!</h4>
                                </a>
                            </h4>
                    </div>
                </div>

                @endif

                <!-- letest news area start -->
                

                 <!-- ad part -->
                 <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="ad-part">
                                <a href="#">
                                    <img src="{{asset('public/website/')}}/images/eb2653770573c9876cffc8f94add4db6300250.png" class="w-100"
                                        alt="no-image">
                                </a>
                            </div>
                        </div>
                    </div>



                
                @if($cate)



                <div class="heading-national text-left">
                                <h4 class="back-title">
                                    <span class="eee">Popular- {{$cate->name}}</span>
                                </h4>
                            </div>


                <div class="row thumbnail">
                    <div class="col-sm-12">
                        <div class="detail_thumb">
                            <div class="thumb-first">
                                <a href="#">
                                <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/smallthum/'.$letestnewsbig->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="" style="width:40px;height:auto;display:inline-block;">
                                </a>
                                <h4>
                                    <a href="{{url('/details')}}/{{$letestnewsbig->slug}}/{{$letestnewsbig->id}}">{{$letestnewsbig->title}}</a>
                                </h4>
                            </div>
                        </div>
                        <div class="sub_thumb">









                            <div class="row">
                            @foreach($propolerposts as $news)
                                <div class="col-sm-6">
                                    <div class="small-thumb">
                                        <a href="#">
                                        <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/smallthum/'.$news->image)}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="" style="width:40px;height:auto;display:inline-block;">
                                        </a>
                                        <h4>
                                        <a href="{{url('/details')}}/{{$news->slug}}/{{$news->id}}">
                                                    <i class="fas fa-angle-double-right"></i>
                                                    <h4>{{Str::limit($news->title,30)}}</h4>
                                                </a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                               
                            </div>
                            


                        </div>
                    </div>
                </div>







                @else

                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="heading-national text-left">
                            <h4 class="back-title">
                                <span class="eee">Category News</span>
                            </h4>
                        </div>
                    </div>

                    <div class="media">
                        <h4 class="media-body">
                            <h4 class="media_heading_box">
                                <a href="#">

                                    <h4>No News Found On This Category!</h4>
                                </a>
                            </h4>
                    </div>
                </div>

                @endif


                <!-- ad part -->
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="ad-part">
                            <a href="#">
                                <img src="{{asset('public/website')}}/images/eb2653770573c9876cffc8f94add4db6300250.png" src="{{asset('public/website/')}}/images/lazy_loader.png" class="w-100" alt="no-image">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- durbartab -->
                <div class="row mt-3">
                    <div class="col-sm-12 text-center">
                        <div class="durbartab_head">
                            <h4>
                                {{Bengali::bn_date_time(5)}}
                                আপনার জন্য নির্বাচিত</h4>
                        </div>
                    </div>

                </div>
                <div class="row">
                    @foreach($selectednews as $row)
                    <div class="col-sm-6">
                        <div class="box_image_news">
                            <a href="{{url('/details')}}/{{$row->slug}}/{{$row->id}}">
                                <img data-src="{{asset('public/uploads/newspost/small/'.$row->image)}}"  src="{{asset('public/website/')}}/images/lazy_loader.png" class="w-100" alt="" style="border-radius: 3px;">
                            </a>
                            <div class="box_news_cont">
                                <h5><a href="{{url('/details')}}/{{$row->slug}}/{{$row->id}}">{{Str::limit($row->title,40)}}</a></h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            
                <!-- ad part -->
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="ad-part">
                            <a href="#">
                                <img src="{{asset('public/website/')}}/images/11032278280141403725.jpg" class="w-100" alt="no-image">
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>




    </div>

</section>


@endsection