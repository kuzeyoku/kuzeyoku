@extends('layout.main')
@section('title', config('setting.general.title'))
@section('content')

    @if ($slider->count() > 0)
        @include('layout.slider')
    @endif
    @include('layout.chose')
    @if ($service->count() > 0)
        @include('layout.service')
    @endif
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
