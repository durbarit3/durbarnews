@extends('website.master')
@section('content')
<!-- news navbar end-->
    <!-- ad section start -->
    <section class="ad mt-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="ad_main">
                        <a href="#">
                            <img src="images/326521926881553421.jpg" class="w-100" alt="">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ad section end -->

    <!-- photo gallery start -->
    <section id="photo_gallary_main">
        <div class="container">
            <div class="margintop2">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb no-margin">
                            <li class="breadcrumb-item"><a href="#">
                                    <i class="fas fa-home text-danger"></i>
                                </a></li>
                            <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">
                                Bangladesh</li>
                          
                        </ol>
                    </div>
                </div>









                @foreach($categores as $category)

                @php
                    $newslist =App\NewsPost::where('is_deleted',0)->where('status',1)->where('cate_id',$category->id) ->orderBY('id','DESC')->limit(8)->get();
                @endphp
                @if(count($newslist) >0)

                <div class="row">
                    <div class="col-sm-12">
                        <div class="live-heading">
                            <h4 class="catTitle">
                                <a href="#">
                                    <i class="fas fa-camera"></i> {{$category->name}} 
                                </a>
                                <span class="liner"></span>
                            </h4>
                        </div>
                       
                    </div>
                </div>
                @endif
                
                <div class="row">


               

                @foreach($newslist as $news)

                
                    <div class="col-sm-3">
                        <div class="single-block">
                            <div class="img_box">
                                <a href="#">
                                    <img src="{{asset('public/uploads/newspost/')}}/{{$news->image}}" class="w-100" alt="">
                                </a>
                                <h4 class="photo_head">
                                    <a href="{{url('')}}">
                                        {{Str::limit($news->title,70)}}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>

                    @endforeach
                 


                </div>
                
            </div>

            @endforeach

















        </div>
    </section>


    <!-- photo gallery end -->
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
    @endsection