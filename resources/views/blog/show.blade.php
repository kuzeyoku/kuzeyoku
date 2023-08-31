@extends('layout.main')
@section('title', $post->getTitle())
@section('content')
    @include('layout.breadcrumb', ['nav' => [route('blog.index') => 'Blog']])
    <div class="blog-area single full-blog full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="blog-content wow fadeInUp">
                    <div class="item">
                        <div class="thumb" style="background-image: url({{ $post->getImageUrl() }})"></div>
                        <div class="info">
                            <div class="meta">
                                <ul>
                                    <li>@svg('ri-calendar-2-line') {{ $post->updated_at->translatedFormat('d m Y') }}</li>
                                    <li>@svg('ri-eye-fill') {{ $post->view_count }} Görüntüleme</li>
                                </ul>
                            </div>
                            <h3>
                                {{ $post->getTitle() }}
                            </h3>
                            {!! Str::limit($post->getDescription(), 150) !!}
                        </div>
                    </div>
                    @if (isset($previousPost) || isset($nextPost))
                        <div class="post-pagi-area">
                            @if (isset($previousPost))
                                <a href="{{ $previousPost->getUrl() }}">
                                    <i class="fas fa-angle-double-left"></i> Önceki Konu
                                    <h5>{{ $previousPost->getTitle() }}</h5>
                                </a>
                            @endif
                            @if (isset($nextPost))
                                <a href="{{ $nextPost->getUrl() }}">
                                    Sonraki Konu <i class="fas fa-angle-double-right"></i>
                                    <h5>{{ $nextPost->getTitle() }}</h5>
                                </a>
                            @endif
                        </div>
                    @endif
                    <div class="post-tags">
                        <div class="tags">
                            @foreach ($post->getTags() as $tag)
                                <span>#{{ $tag }}</span>
                            @endforeach

                        </div>
                        <span class="font-weight-bold">{{ $post->user->name }}</span>
                    </div>
                    <!-- End Post Tags -->

                    <!-- Start Blog Comment -->
                    {{-- <div class="blog-comments">
                            <div class="comments-area">
                                <div class="comments-title">
                                    <h4>
                                        5 comments
                                    </h4>

                                    <div class="comments-list">
                                        <div class="commen-item">
                                            <div class="avatar">
                                                <img src="assets/img/teams/1.jpg" alt="Author">
                                            </div>
                                            <div class="content">
                                                <div class="title">
                                                    <h5>Jonathom Doe</h5>
                                                    <span>28 Aug, 2020</span>
                                                </div>
                                                <p>
                                                    Delivered ye sportsmen zealously arranging frankness estimable as. Nay
                                                    any article enabled musical shyness yet sixteen yet blushes. Entire its
                                                    the did figure wonder off.
                                                </p>
                                                <div class="comments-info">
                                                    <a href=""><i class="fa fa-reply"></i>Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comments-list">
                                        <div class="commen-item">
                                            <div class="avatar">
                                                <img src="assets/img/teams/2.jpg" alt="Author">
                                            </div>
                                            <div class="content">
                                                <div class="title">
                                                    <h5>Jonathom Doe</h5>
                                                    <span>28 Aug, 2020</span>
                                                </div>
                                                <p>
                                                    Delivered ye sportsmen zealously arranging frankness estimable as. Nay
                                                    any article enabled musical shyness yet sixteen yet blushes. Entire its
                                                    the did figure wonder off.
                                                </p>
                                                <div class="comments-info">
                                                    <a href=""><i class="fa fa-reply"></i>Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="commen-item reply">
                                            <div class="avatar">
                                                <img src="assets/img/teams/3.jpg" alt="Author">
                                            </div>
                                            <div class="content">
                                                <div class="title">
                                                    <h5>Spart Lee</h5>
                                                    <span>17 Feb, 2020</span>
                                                </div>
                                                <p>
                                                    Delivered ye sportsmen zealously arranging frankness estimable as. Nay
                                                    any article enabled musical shyness yet sixteen yet blushes. Entire its
                                                    the did figure wonder off.
                                                </p>
                                                <div class="comments-info">
                                                    <a href=""><i class="fa fa-reply"></i>Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-form">
                                    <div class="title">
                                        <h4>Leave a comments</h4>
                                    </div>
                                    <form action="#" class="contact-comments">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- Name -->
                                                    <input name="name" class="form-control" placeholder="Name *"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!-- Email -->
                                                    <input name="email" class="form-control" placeholder="Email *"
                                                        type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group comments">
                                                    <!-- Comment -->
                                                    <textarea class="form-control" placeholder="Comment"></textarea>
                                                </div>
                                                <div class="form-group full-width submit">
                                                    <button type="submit">
                                                        Post Comments
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    <!-- End Comments Form -->

                </div>

            </div>
        </div>
    </div>
@endsection
