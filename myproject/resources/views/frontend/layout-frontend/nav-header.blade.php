<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{route('page.index')}}" class="logo d-flex align-items-center">
            <img src="{{asset('FlexStart/assets/img/logo.png')}}" alt="">
            <span>DKT</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{route('page.index')}}">Trang chủ</a></li>
                <li><a class="nav-link scrollto" href="{{route('blog.index')}}">Tin tức</a></li>
                <li><a class="nav-link scrollto" href="#services">Dự án</a></li>
                <li><a class="nav-link scrollto" href="#services">Tuyển dụng</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Về chúng tôi</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>
<!-- End Header -->
