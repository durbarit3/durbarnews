@extends('website.master')
@section('content')
<!-- ad section end -->
    <section id="national">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 main-content">
                    <div class="row">
                        <div class="col-sm-12">
                            @if($sub_pages)
                            <article class="box-white">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">
                                            <i class="fas fa-home text-danger"></i>
                                        </a></li>
                                    <li class="breadcrumb-item text-default active" aria-current="page"
                                        style="font-size: 14px;">
                                        {{$sub_pages->title}}</li>
                                </ol>
                                <h3 class="no-margin">
                                   <a href="#" style="text-decoration: none;color: #000;font-size: 24px;">
                                   {{$sub_pages->title}}</li>
                                   </a>
                                </h3>
                                <div class="dividerDetails"></div>
                             
                                <div class="content_details">
                                    <p>{!! $sub_pages->description  !!}</p>
                              
                            </article>
                            @endif
                        </div>
                    </div><br>
                 


                </div>
                
            </div>




        </div>

    </section>


    @endsection