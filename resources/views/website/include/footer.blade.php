<section id="news_footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 text-left">
                    <div class="logo_foot">
                        <img src="{{asset('public/website/')}}/images/logo.webp" class="w-100" alt="">
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
                        <p>Jagonews24.com is one of the popular bangla news portals. It has begun with commitment of
                            fearless, investigative, informative and independent journalism. This online portal has
                            started to provide real time news updates with maximum use of modern technology from 2014.
                            Latest & breaking news of home and abroad, entertainment, lifestyle, special reports,
                            politics, economics, culture, education, information technology, health, sports, columns and
                            features are included in it. A genius team of Jago News has been built with a group of
                            country's energetic young journalists. We are trying to build a bridge with Bengalis around
                            the world and adding a new dimension to online news portal. The home of materialistic news.
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
                        <span>Acting Editor: Mohiuddin Sarker</span>
                        <br>
                        <span>
                            © 2017 All Rights Reserved | Jagonews24.com, A Sister concern of AKC Private LTD.</span>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="button">
                        <span><a href="#">About Us</a></span>
                        <span><a href="#">Contact</a></span>
                        <span><a href="#">Privacy and Policy</a></span>

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
                                    <a href="#">{{ $news->title }}</a>
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
