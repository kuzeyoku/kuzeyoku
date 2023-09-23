@extends('layout.main')
@section('title', $post->getTitle())
@section('content')
@include('layout.breadcrumb', ['nav' => [route('blog.index') => __('front/blog.page_title')]])
<div class="blog-area single full-blog full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="blog-content wow fadeInUp">
                <div class="item">
                    <div class="thumb">
                        <img src="{{ $post->getImageUrl() }}" alt="{{ $post->getTitle() }}">
                    </div>
                    <div class="info">
                        <div class="meta">
                            <ul>
                                <li>@svg('ri-calendar-2-line') {{ $post->getCreatedDate() }}</li>
                                <li>@svg('ri-eye-fill') {{ $post->view_count }} {{ __('front/blog.view') }}</li>
                                <li>@svg('ri-list-check-2') {{ $post->getCategoryTitle() }}</li>
                            </ul>
                        </div>
                        <h3>
                            {{ $post->getTitle() }}
                        </h3>
                        {!! $post->getDescription() !!}
                    </div>
                </div>
                @if (isset($previousPost) || isset($nextPost))
                <div class="post-pagi-area">
                    @if (isset($previousPost))
                    <a href="{{ $previousPost->getUrl() }}">
                        <i class="fas fa-angle-double-left"></i> {{ __('front/blog.previous_post') }}
                        <h5>{{ $previousPost->getTitle() }}</h5>
                    </a>
                    @endif
                    @if (isset($nextPost))
                    <a href="{{ $nextPost->getUrl() }}">
                        {{ __('front/blog.next_post') }} <i class="fas fa-angle-double-right"></i>
                        <h5>{{ $nextPost->getTitle() }}</h5>
                    </a>
                    @endif
                </div>
                @endif
                <div class="post-tags">
                    <div class="tags">
                        @foreach ($post->getTags() as $tag)
                        <span>#{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                    <span class="font-weight-bold">{{ $post->user->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
