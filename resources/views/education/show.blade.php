@extends('layout.main')
@section('title', $education->getTitle())
@section('content')
    @include('layout.breadcrumb', [
        'nav' => [route('education.index') => __('front/education.page_title')],
    ])
    <div class="blog-area single full-blog full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="blog-content wow fadeInUp">
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ $education->getImageUrl() }}" alt="{{ $education->getTitle() }}">
                        </div>
                        <div class="info">
                            <h3>
                                {{ $education->getTitle() }}
                            </h3>
                            {!! $education->getDescription() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
