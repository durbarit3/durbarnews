     <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="countdown">
                                <img src="{{asset('public/website/')}}/images/mujib-borsho-color.webp" class="w-100" alt="no image">
                            </div>
                        </div>
                    </div>

                    <!-- tabs part -->
                    <div class="row mt-4">
                        <div class="col-sm-12 news_list nt">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Latest News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Populer News</a>
                                </li>

                            </ul>
                            <div class="tab-content nav-detail" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <ul class="media-list">
                                    

                                    	@foreach($latestnews as $key => $lnews)
                                        <li class="media">
                                            <div class="media-left">
                                                <span>{{++$key}}</span>
                                                <a href="#">
                                                  <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/small/'.$lnews->image)}}" alt=""class="lazy img-fluid">
                                                   @if($lnews->post_type==2)
                                                     <a href="#" class="play-button">
                                                            <i class="fas fa-play"></i>
                                                     </a>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4 class="tab-list">
                                                        <a href="#" style="font-size:16px;font-weight:600;color:#000">
                                                           {{Str::limit($lnews->title,30)}}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>



                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    <ul class="media-list">
                                    	@foreach($popularnews as $key => $popular)
                                        <li class="media">
                                            <div class="media-left">
                                                <span>{{ ++$key }}</span>
                                                <a href="#">
                                                     <img src="{{asset('public/website/')}}/images/lazy_loader.png" data-src="{{asset('public/uploads/newspost/small/'.$popular->image)}}" alt=""class="lazy img-fluid">
                                                     @if($popular->post_type==2)
                                                     <a href="#" class="play-button">
                                                            <i class="fas fa-play"></i>
                                                     </a>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <h4 class="tab-list">
                                                        <a href="#" style="font-size:16px;font-weight:600;color:#000">
                                                            {{Str::limit($popular->title,30)}}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                   
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
