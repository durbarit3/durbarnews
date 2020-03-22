<!-- header area -->
<header class="header_area">
    <!-- logo -->
    <div class="sidebar_logo">
    <a href="{{ route('admin.home') }}">
            <img src="{{asset('public/admins/images/logo/'.$logos->adminlogo)}}" alt="" class="img-fluid logo1">
            <img src="{{asset('public/admins/')}}/images/logo_small.png" alt="" class="img-fluid logo2">
        </a>
    </div>
    <div class="sidebar_btn">
        <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
    </div>
    <ul class="header_menu">
        <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
            <div class="user_item dropdown-menu dropdown-menu-right">
                <div class="admin">
                    <a href="#" class="user_link"><img src="assets/images/admin.jpg" alt=""></a>
                </div>
                <ul>

                    <li><a href="#"><span><i class="fas fa-user"></i></span> User Profile</a></li>
                    <li><a href="#"><span><i class="fas fa-cogs"></i></span> Settings</a></li>
                    <li>
                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span><i class="fas fa-unlock-alt"></i></span>
                        Logout
                   </a>
                </li>
                </ul>
            </div>
        </li>
        <li><a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
    </ul>
</header><!-- / header area -->

<form id="logout-form" action="{{ route('logout') }}" method="post">
    @csrf
</form>
