@extends('layout.main')
@section('title', config('setting.general.title'))
@section('content')

    @if ($sliders->count() > 0)
        @include('layout.slider')
    @endif

    @if ($services->count() > 0)
        @include('layout.service')
    @endif

    @include('layout.about')

    @if ($projects->count() > 0)
        @include('layout.project')
    @endif

    @if ($testimonials->count() > 0)
        @include('layout.testimonial')
    @endif

    @include('layout.counter')

    @include('layout.contact', ['half' => true])

    @if ($blogs->count() > 0)
        @include('layout.blog')
    @endif

@endsection
