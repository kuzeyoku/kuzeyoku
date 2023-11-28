@extends('layout.main')
@section('title', config('setting.general.title'))
@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <video controls autoplay loop muted class="myvid w-100" id="player">
                    <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                        type="video/mp4">
                </video>
            </div>
        </div>
    </div>
    {{-- @if ($slider->count() > 0)
        @include('layout.slider')
    @endif --}}
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
    @if ($reference->count() > 0)
        @include('layout.reference')
    @endif
@endsection
@section('script')
    @if (config('setting.recaptcha.status') == App\Enums\StatusEnum::Active->value)
        <script>
            function onSubmit(token) {
                document.getElementById("contact-form").submit();
            }
        </script>
    @endif
@endsection
