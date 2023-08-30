@extends('layout.main')
@section('title', $project->getTitle())
@section('content')
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url({{ asset('assets/img/banner/13.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $project->getTitle() }}</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Ana Sayfa</a></li>
                        <li><a href="{{ route('project.index') }}">Projelerimiz</a></li>
                        <li class="active">{{ $project->getTitle() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="project-details-area default-padding">
        <div class="container">
            <div class="thumb" style="background-image: url({{ $project->getImageUrl() }})"></div>
            <div class="top-info">
                <div class="row">
                    <div class="col-lg-7 left-info">
                        <h2>{{ $project->getTitle() }}</h2>
                        <iframe width="100%" height="300" src="{{ $project->model3D }}">
                        </iframe>
                    </div>
                    <div class="col-lg-5 right-info">
                        <div class="project-info">
                            <h3>Proje Detayları</h3>
                            <ul>
                                @foreach ($project->getFeaturesList() as $key => $value)
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
                {{ $project->getDescription() }}
                @if ($project->video)
                    <iframe width="100%" height="400" src="{{ $project->video }}"></iframe>
                @endif
                <div class="row">
                    @foreach ($project->images as $image)
                        <div class="col-lg-4">
                            <a href="{{ $image->getImageUrl() }}" class="item popup-gallery"><img
                                    src="{{ $image->getImageUrl() }}" alt="{{ $project->getTitle() }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
