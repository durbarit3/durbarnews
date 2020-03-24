<section id="news_footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 text-left">
                    <div class="logo_foot">
                         @if($logo)
                        <img src="{{asset('public/admins/images/logo')}}/{{$logo->frontlogo}}" class="w-100" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-sm-9 text-right">
                    <div class="an">
                        <span>
                            <a href="#">
                                <img src="{{asset('public/website/')}}/images/Android-app-jagonews.png" width="100"></a>
                        </span>
                        <span>
                            <a href="#">
                                <img src="{{asset('public/website/')}}/images/Android-app-jagonews.png" width="100"></a>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-justify">
                    <div class="news-about">
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer-last">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="bottom-address">
                        
                        
                        <span>
                            © {{date('Y')}} {{URL::to('/')}} | All Rights Reserved</span>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="button">
                        @foreach($pages as $page)
                            <span><a href="{{url('/site/pages')}}/{{$page->slug}}">{{$page->title}}</a></span>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="scroll_top">
            <span><i class="fas fa-angle-up"></i></span>
        </div>

    </footer>
    <section id="footer_news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="content">
                        <div class="simple-marquee-container">
                            <div class="marquee-sibling">
                                <h4> Breaking News</h4>
                            </div>
                            <div class="marquee">
                                <ul class="marquee-content-items">
                                    @foreach ($brakingNews as $news)
                                    <li>
                                    <a href="{{ url('details/'.$news->slug.'/'.$news->id) }}">{{ $news->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
