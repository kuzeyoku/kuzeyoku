@extends('layout.main')
@section('title', config('setting.general.title'))
@section('content')
    <!-- Start Banner
            ============================================= -->
    @include('layout.slider')
    <!-- End Banner -->

    <!-- Star Services Area
            ============================================= -->
    @include('layout.service')
    <!-- End Services Area -->

    <!-- Start About Area
            ============================================= -->
    @include('layout.about')
    <!-- End About Area -->

    <!-- Start Technology Area
            ============================================= -->
    @include('layout.technology')
    <!-- End Technology Area -->

    <!-- Start Fun Factor Area
            ============================================= -->
    @include('layout.counter')
    <!-- End Fun Factor Area -->

    <!-- Start Case Studies Area
            ============================================= -->
    @include('layout.project')
    <!-- End Case Studies Area -->

    <!-- Start Testimonials Area
            ============================================= -->
    @include('layout.testimonial')
    <!-- End Testimonials Area -->

    <!-- Start Pricing Area
            ============================================= -->
    @include('layout.pricing')
    <!-- End Pricing Area -->

    <!-- Start Contact Area
            ============================================= -->
    @include('layout.contact')
    <!-- End Contact Area -->

    <!-- Start Blog Area
            ============================================= -->
    @include('layout.blog')
    <!-- End Blog Area Area -->
@endsection
