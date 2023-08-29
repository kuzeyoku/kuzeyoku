@extends('layout.main')
@section('title', $service->getTitle())
@section('content')
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url({{ asset('assets/img/banner/11.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $service->getTitle() }}</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Ana Sayfa</a></li>
                        <li><a href="{{ route('service.index') }}">Hizmetlerimiz</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="services-details-area default-padding">
        <div class="container">
            <div class="services-details-items">
                <div class="row">
                    <div class="col-lg-4 services-sidebar order-last order-lg-first">
                        <!-- Single Widget -->
                        <div class="single-widget services-list">
                            <h4 class="widget-title">Diğer Hizmetlerimiz</h4>
                            <div class="content">
                                <ul>
                                    @foreach ($other as $ss)
                                        <li class="{{ $loop->first ? 'current-item' : '' }}"><a
                                                href="{{ route('service.show', [$ss, $ss->slug]) }}">{{ $ss->getTitle() }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget quick-contact text-light"
                            style="background-image: url({{ asset('assets/img/about/1.jpg') }});">
                            <div class="content">
                                <i class="fas fa-phone"></i>
                                <h4>Bize Ulaşın?</h4>
                                <p>
                                    Hizmetlerimiz ve fiyatlarımız hakkında bilgi almak için 7/24 arayabiliriniz.
                                </p>
                                <h2>{{ config('setting.contact.phone') }}</h2>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget brochure">
                            <h4 class="widget-title">Brochure</h4>
                            <ul>
                                <li><a href="#"><i class="fas fa-file-pdf"></i> Download Docs</a></li>
                                <li><a href="#"><i class="fas fa-file-word"></i> Company details</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-8 services-single-content">
                        <img src="{{ $service->getImageUrl() }}" alt="{{ $service->getTitle() }}">
                        <h2>{{ $service->getTitle() }}</h2>
                        <p>
                            {!! $service->getDescription() !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
