

    <div class="navbar_header">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="search-bar">
                        <div class="search_icon">
                            <i class="fas fa-search"></i>
                        </div>

                    </div>
                    <div class="search-input" style="display: none;">
                        <input type="text" class="form-control" placeholder="Search Here....">
                    </div>
                    <div id="nav_menu">
                        @if($public_menu)
                        <ul>

                            <li><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>









                            @foreach($public_menu as $menu)


                            <li class="active"><a href="{{ url($menu['link'])}}">{{ $menu['label'] }}</a>
                            @if( $menu['child'] )
                            <span class="menu_arrow"><i class="fas fa-angle-down"></i></span>
                                <div class="drop_menu">
                                    <ul>
                                        @foreach( $menu['child'] as $child )
                                            <li><a href="{{url($child['link'])}}">{{ $child['label'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            </li>


                            @endforeach


                            <li class="active"><a href="#">Archive <span class="menu_arrow"><i
                                            class="fas fa-angle-down"></i></span></a>
                                <div class="mega_menu">
                                    <div class="row">
                                        
                                        
                                        <div class="col-sm-3">
                                            <div class="mega_list">
                                                <ul>
                                                    <li><a href="{{route('categores')}}">Category</a></li>
                                                    <li><a href="#">Item1</a></li>
                                                    <li><a href="#">Item1</a></li>
                                                    <li><a href="#">Item1</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <div class="other_list">
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-accessible-icon"></i> Item1</a>
                                                    </li>
                                                    <li><a href="#"><i class="fab fa-accessible-icon"></i> Item1</a>
                                                    </li>
                                                    <li><a href="#"><i class="fab fa-accessible-icon"></i> Item1</a>
                                                    </li>
                                                    <li><a href="#"><i class="fab fa-accessible-icon"></i>Item1</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="eng" style="background-color:rgb(0, 0, 0);padding: 3px 10px;font-weight: 700;"><a
                                    href="#">live</a>
                            </li>

                    </div>

                    </li>

                    </ul>

                    @endif

                </div>

            </div>
        </div>
    </div>
    <!-- </div>
