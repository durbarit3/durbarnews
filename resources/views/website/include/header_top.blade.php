<header class="navbar">
        <div class="container">
            <div class="row">
             

                <div class="col-sm-3 text-left">
                    <div class="logo">
                        @if($logo)
                        <img src="{{asset('public/admins/images/logo')}}/{{$logo->frontlogo}}" class="w-100" alt="">
                        @endif
                    </div>
                </div>

               

                <div class="col-sm-5 text-right">
                    <div class="address">
                        <span><i class="fas fa-map-marker-alt"></i> ঢাকা, মঙ্গলবার, ১৭ মার্চ ২০২০ | ২ চৈত্র ১৪২৬
                            বঙ্গাব্দ</span>
                    </div>
                </div>

                <div class="col-sm-4 text-right">
                    <div class="social_media">
                        @if($social)
                        <ul>
                            <li>
                        
                                <a href="{{$social->info->facebook}}" class="fb">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="{{$social->info->twitter}}" class="tw">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{$social->info->instagram}}" class="in">
                                    <i class="fab fa-instagram"></i>
                                </a>
                              
                                <a href="{{$social->info->youtube}}" class="yt">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="{{$social->info->feed}}" class="rs">
                                    <i class="fas fa-rss"></i>
                                </a>

                            </li>
                        </ul>
                        @endif
                    </div>
                </div> 

            </div>
        </div>
    </header> 


