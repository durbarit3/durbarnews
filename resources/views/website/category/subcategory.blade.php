@extends('website.master')
@section('content')
<!-- ad section end -->
<section id="national">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb no-margin">
                    <li class="breadcrumb-item"><a href="#">
                            <i class="fas fa-home text-danger"></i>
                        </a></li>
                    <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">
                        {{$cat}}</li>
                    <li class="breadcrumb-item text-default active" aria-current="page" style="font-size: 14px;">
                        {{$subcat}}</li>
                </ol>
            </div>
        </div>
        @if(count($newsposts) > 0)
        <div class="row">
            <div class="col-sm-8 main-content">

                <div class="row">

                    <div class="col-sm-12">
                        <div class="single-block-national">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="img_box">
                                        <a href="#">
                                            <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/bigthum')}}/{{$newspostsfirst->image}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="">

                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 p-0 text-left">
                                    <div class="img_cont_national">
                                        <h4><a href="{{url('/details')}}/{{$newspostsfirst->slug}}/{{$newspostsfirst->id}}" style="text-decoration: none;color: #000;">{{$newspostsfirst->title}}</a></h4>
                                        <p>{!! Str::limit($newspostsfirst->description,250) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>




                <div class="row paddingtop">

                    @foreach($newsposts as $newspost)
                    <div class="col-sm-6">
                        <div class="single-block-n">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="img_box_n">
                                        <a href="#">
                                            <img class="lazy w-100" data-src="{{asset('public/uploads/newspost/small')}}/{{$newspost->image}}" src="{{asset('public/website/')}}/images/lazy_loader.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="image_cont_n">
                                        <p>
                                            <a href="{{url('/details')}}/{{$newspost->slug}}/{{$newspost->id}}">{{Str::limit($newspost->title,50)}}</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                    @endforeach


                    <div class="col-sm-12 text-center mt-3">
                        {{$newsposts->links()}}

                    </div>


                </div>



            </div>

            <div class="col-sm-4 aside">


                <div class="row">
                    <div class="col-sm-12">
                        <div class="row mt-4">
                            <div class="col-sm-12 news_list nt">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Latest News</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Populer
                                            News</a>
                                    </li>

                                </ul>
                                <div class="tab-content nav-detail" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-left">
                                                    <span>1</span>
                                                    <a href="#">
                                                        <img src="images/ashraful-20200225104941.jpg" alt="no-image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <h4>
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                        <img src="images/samira-01-20200226132030.webp" alt="no-image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <h4>
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
                                                                Lorem ipsum dolor sit, amet consectetur adipisicing.
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>



                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

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
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                        <img src="images/samira-01-20200226132030.webp" alt="no-image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <h4>
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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
                                                            <a href="#" style="font-size:16px;font-weight:600;color:#000">
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


@endsection