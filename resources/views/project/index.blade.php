@extends('layout.main')
@section('title', 'Projelerimiz')
@section('content')
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url({{ asset('assets/img/banner/11.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Projelerimiz</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Ana Sayfa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="case-studies-area overflow-hidden grid-items default-padding">
        <div class="container">
            <div class="case-items-area">
                <div class="masonary">
                    <div id="portfolio-grid" class="case-items colums-2" style="position: relative; height: 1140px;">

                        @foreach ($projects as $project)
                            <div class="pf-item" style="position: absolute; left: 0%; top: 0px;">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ $project->getImageUrl() }}" alt="Thumb">
                                        <a href="{{ $project->getImageUrl() }}" class="item popup-gallery"><i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                    <div class="info">
                                        <div class="tags">
                                            <a href="#">Networking</a> /
                                            <a href="#">Technology</a>
                                        </div>
                                        <h4>
                                            <a href="{{ $project->getUrl() }}">{{ $project->getTitle() }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
