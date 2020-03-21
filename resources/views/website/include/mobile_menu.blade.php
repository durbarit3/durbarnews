<!-- news navbar start-->
<div class="nav-mobile-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="mobile_header">
                        <div class="icon_bar">
                            <i class="fas fa-bars"></i>
                        </div>
                        <div class="search_icon_mb">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="search-input" style="display: none;">
                            <input type="text" class="form-control" placeholder="Search Here....">
                        </div>
                    </div>
                    <div class="mobile_mega" style="display: none;">
                    @if($public_menu)
                        <ul>
                            @foreach($public_menu as $menu)
                            <li><a href="{{ url($menu['link'])}}">{{ $menu['label'] }}</a></li>
                            @endforeach
    
                        </ul>
                    @endif
                        <div class="ad_menu">
                            <ul>
                                <li style="display: block;width: 100%;"><a href="#"><i class="fab fa-algolia"></i>
                                        Archive</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>