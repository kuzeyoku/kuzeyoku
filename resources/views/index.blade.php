@extends('layout.main')
@section('title', config('setting.general.title'))
@section('content')
    @if ($slider->count() > 0)
        @include('layout.slider')
    @endif
    @if ($service->count() > 0)
        @include('layout.service')
    @endif
    @include('layout.about')
    @if ($project->count() > 0)
        @include('layout.project')
    @endif
    @if ($testimonial->count() > 0)
        @include('layout.testimonial')
    @endif
    @include('layout.counter')
    @include('layout.contact', ['half' => true])
    @if ($blog->count() > 0)
        @include('layout.blog')
    @endif
@endsection
