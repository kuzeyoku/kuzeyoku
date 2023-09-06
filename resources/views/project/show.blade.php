@extends('layout.main')
@section('title', $project->getTitle())
@section('content')
    @include('layout.breadcrumb', ['nav' => [route('project.index') => __('front/project.page_title')]])
    <div class="project-details-area default-padding">
        <div class="container">
            <div class="thumb" style="background-image: url({{ $project->getImageUrl() }})"></div>
            <div class="top-info">
                <div class="row">
                    <div class="col-lg-7 left-info">
                        <h2>{{ $project->getTitle() }}</h2>
                        <iframe width="100%" height="300" src="{{ $project->model3D }}"></iframe>
                    </div>
                    <div class="col-lg-5 right-info">
                        <div class="project-info">
                            <h3>{{ __('front/project.detail') }}</h3>
                            <ul>
                                @foreach ($project->getFeatures() as $key => $value)
                                    <li>
                                        {{ $key }} <span>{{ $value }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                {!! $project->getDescription() !!}
                @if ($project->video)
                    <iframe width="100%" height="400" src="{{ $project->video }}"></iframe>
                @endif
                <div class="row">
                    @foreach ($project->images as $image)
                        <div class="col-lg-4">
                            <a href="{{ $image->getImageUrl() }}" class="item popup-gallery">
                                <img src="{{ $image->getImageUrl() }}" alt="{{ $project->getTitle() }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
