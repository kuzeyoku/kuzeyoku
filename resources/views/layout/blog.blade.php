<div class="blog-area default-padding-bottom bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    {{-- <h5>Our Blog</h5> --}}
                    <h2 class="area-title">Bizden Haberler ve Blog</h2>
                    <div class="devider"></div>
                    <p>
                        Gündeme dair haberleri, çalışmalarımızda kullandığımız teknolojiler ve konular hakkında bilgi
                        paylaşımında bulunduğumuz bloğumuz.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blog-items">
            <div class="row">

                @foreach ($blogs as $blog)
                    <div class="single-item col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <img class="home" src="{{ $blog->getImageUrl() }}" alt="{{ $blog->getTitle() }}">
                                <div class="date">{{ $blog->updated_at->day }}
                                    <span>{{ $blog->updated_at->translatedFormat('m Y') }}</span>
                                </div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li><i class="fas fa-user"></i> {{ $blog->user->name }}</li>
                                        <li><i class="fas fa-eye"></i> {{ $blog->view_count }}</li>
                                    </ul>
                                </div>
                                <h4>
                                    <a href="{{ $blog->getUrl() }}">{{ $blog->getTitle() }}</a>
                                </h4>
                                <p>
                                    {!! Str::limit($blog->getDescription(), 110) !!}
                                </p>
                                <a class="btn-more" href="{{ $blog->getUrl() }}">Devamı
                                    <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
