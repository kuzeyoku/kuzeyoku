@extends('layout.main')
@section('title', 'Blog')
@section('content')
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url(assets/img/banner/11.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Blog Sidebar</h2>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li class="active">Sidebar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area full-blog right-sidebar full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content col-lg-8 col-md-12">
                        <div class="blog-item-box">

                            @foreach ($posts as $post)
                                <div class="single-item">
                                    <div class="item wow fadeInUp">
                                        <div class="thumb">
                                            <a href="{{ $post->getUrl() }}">
                                                <img src="{{ $post->getImageUrl() }}" alt="{{ $post->getTitle() }}">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="meta">
                                                <ul>
                                                    <li><i class="fas fa-calendar-alt"></i>
                                                        {{ $post->updated_at->translatedFormat('d m Y') }}</li>
                                                    <li><i class="fas fa-eye"></i> {{ $post->view_count }} Görüntüleme</li>
                                                </ul>
                                            </div>
                                            <h3>
                                                <a href="{{ $post->getUrl() }}">{{ $post->getTitle() }}</a>
                                            </h3>
                                            <p>
                                                {{ Str::limit($post->getDescription(), 160) }}
                                            </p>
                                            <div class="bottom">
                                                <a href="#">
                                                    <img src="assets/img/teams/1.jpg" alt="Author">
                                                    <span>{{ $post->user->name }}</span>
                                                </a>
                                                <a class="btn circle btn-theme effect btn-md"
                                                    href="{{ $post->getUrl() }}">Devamı</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area text-center">
                                <nav aria-label="navigation">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#"><i
                                                    class="fas fa-angle-double-left"></i></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i
                                                    class="fas fa-angle-double-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="sidebar wow fadeInLeft col-lg-4 col-md-12">
                        <aside>
                            <div class="sidebar-item search">
                                <div class="sidebar-info">
                                    <form>
                                        <input type="text" name="text" class="form-control">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-item recent-post">
                                <div class="title">
                                    <h4>Recent Post</h4>
                                </div>
                                <ul>
                                    @foreach ($popularPost as $post)
                                        <li>
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="{{ $post->getImageUrl() }}" alt="Thumb">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <a href="{{ $post->getUrl() }}">{{ $post->getTitle() }}</a>
                                                <div class="meta-title">
                                                    <span class="post-date"><i class="fas fa-calendar-alt"></i>
                                                        {{ $post->updated_at->translatedFormat('d m Y') }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sidebar-item category">
                                <div class="title">
                                    <h4>category list</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <a href="#">national <span>(69)</span></a>
                                        </li>
                                        <li>
                                            <a href="#">national <span>(25)</span></a>
                                        </li>
                                        <li>
                                            <a href="#">sports <span>(18)</span></a>
                                        </li>
                                        <li>
                                            <a href="#">megazine <span>(37)</span></a>
                                        </li>
                                        <li>
                                            <a href="#">health <span>(12)</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item social-sidebar">
                                <div class="title">
                                    <h4>follow us</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li class="facebook">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="pinterest">
                                            <a href="#">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                        <li class="g-plus">
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li class="linkedin">
                                            <a href="#">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item tags">
                                <div class="title">
                                    <h4>tags</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li><a href="#">Fashion</a>
                                        </li>
                                        <li><a href="#">Education</a>
                                        </li>
                                        <li><a href="#">nation</a>
                                        </li>
                                        <li><a href="#">study</a>
                                        </li>
                                        <li><a href="#">health</a>
                                        </li>
                                        <li><a href="#">food</a>
                                        </li>
                                        <li><a href="#">travel</a>
                                        </li>
                                        <li><a href="#">science</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <!-- End Start Sidebar -->
                </div>
            </div>
        </div>
    </div>
@endsection
