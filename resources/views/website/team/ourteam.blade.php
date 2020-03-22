
@extends('website.master')
@section('content')
    <section id="ad" style="padding: 10px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="ad_main">
                        <a href="#">
                            <img src="{{asset('public/website')}}/images/15798962006367364458.gif" class="w-100" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ad section end -->
    <section id="team_member">
        <div class="container">
            <div class="row">
            	@foreach($team as $data)

                <div class="col-sm-3 text-center">
                
                    <div class="tema_wrapper">
                        <div class="profile_pic">
                            <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/admins/images/team/'.$data->image)}}" alt="" class="lazy img-fluid">
                            <p class="more"><a href="{{url('newsportal/ourteam/teammember/'.$data->id)}}">More About</a></p>
                        </div>
                        <div class="title_name">
                           <a href="{{url('newsportal/ourteam/teammember/'.$data->id)}}"> <h4>{{$data->name}}</h4></a>
                            <p>{{$data->designation}}</p>
                        </div>
                        <div class="social_menu">
                            <a href="{{$data->facebook}}">
                                <span class="facebok span1"><i class="fab fa-facebook-f"></i></span>
                                
                            </a>
                            <a href="{{$data->twitter}}">
                                <span class="twitter span1"><i class="fab fa-twitter"></i></span>
                               
                            </a>
                            <a href="{{$data->instagram}}">
                                <span class="linkedin span1"><i class="fab fa-linkedin-in"></i></span>
                              
                            </a>
                        </div> 
                    </div>
                   
                </div>
                @endforeach
          
            
                
            </div>
        </div>
    </section>




    <!--  -->

  @endsection