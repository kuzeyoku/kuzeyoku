@extends('layout.main')
@section('title', 'İletişim')
@section('content')
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url({{ asset('assets/img/banner/9.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>İletişim</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Ana Sayfa</a></li>
                        <li class="active">İletişim</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('layout.contact', ['half' => false])
    <div class="maps-area">
        <div class="google-maps">
            <iframe src="{{ config('setting.contact.map') }}"></iframe>
        </div>
    </div>

@endsection
