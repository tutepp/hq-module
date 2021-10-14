<!doctype html>
<html lang="en">
<head>
   @include('frontend.layout-frontend.meta.meta-head')
    <title>Document</title>
</head>
<body>
@include('frontend.layout-frontend.nav-header')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{route('page.index')}}">Home</a></li>
                <li><a href="{{route('blog.index')}}">Tin tức</a></li>
            </ol>
            <h2>Tin tức</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    @foreach($items as $item)
                    <article class="entry">
                        <div class="entry-img">
                            <img src="{{$item->image}}" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a href="{{route('blog.item',['slug'=>$item->slug])}}">{{$item->title}}</a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{$item->user->name}}</li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="2020-01-01">{{$item->created_at}}</time></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p> {!! $item->description !!}</p>
                            <div class="read-more">
                                <a href="{{route('blog.item',['slug'=>$item->slug])}}">Xem thêm</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                    @endforeach
                    <div class="blog-pagination d-flex justify-content-center">
                        {!! $items->links() !!}
                    </div>

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Tìm kiếm</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Tin tức về công ty</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="#">Du lịch </a></li>
                                <li><a href="#">Liên hoan </a></li>
                                <li><a href="#">Sự kiện </a></li>
                                <li><a href="#">Từ thiện </a></li>
                                <li><a href="#">Dự án đào tạo </a></li>
                                <li><a href="#">Dự án kinh doanh </a></li>
                            </ul>
                        </div><!-- End sidebar categories-->

                        <h3 class="sidebar-title">Những bài viết khác</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach($myItems as $myItem)
                                <div class="post-item clearfix">
                                    <img src="{{$myItem->image}}" alt="" style="width:50px;height: 30px ">
                                    <h4><a href=""></a>{{$myItem->title}}</h4>
                                    <time datetime="2020-01-01">{{$myItem->created_at}}</time>
                                </div>
                            @endforeach
                        </div><!-- End sidebar recent posts-->

                        <h3 class="sidebar-title">Tags</h3>
                        <div class="sidebar-item tags">
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">TikTok</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">B2C</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div><!-- End sidebar tags-->

                    </div><!-- End sidebar -->

                </div>
            <!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
@include('frontend.layout-frontend.nav-footer')
@include('frontend.layout-frontend.meta.meta-footer')
</body>
</html>
