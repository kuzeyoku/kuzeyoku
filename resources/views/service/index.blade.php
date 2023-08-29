@extends('layout.main')
@section('title', 'Hizmetlerimiz')
@section('content')
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light"
        style="background-image: url({{ asset('assets/img/banner/11.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Hizmetlerimiz</h2>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Ana Sayfa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="services-area default-padding">
        <div class="container">
            <div class="services-content text-center">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="single-item col-lg-3 col-md-6">
                            <div class="item">
                                <img src="{{ $service->getImageUrl() }}" alt="Thumb">
                                <h5><a
                                        href="{{ route('service.show', [$service, $service->slug]) }}">{{ $service->getTitle() }}</a>
                                </h5>
                                <p>
                                    {{ Str::limit($service->getDescription(), 90, '...') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bottom-content text-center">
                    <p>
                        Bazı işler için fazla para ve zaman harcamayı bırakın <a href="{{ route('contact.index') }}">Hemen
                            Teklif
                            Alın</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="choose-us-area overflow-hidden reverse default-padding-bottom">
        <div class="container">
            <div class="row align-center">

                <div class="col-lg-6 info wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <h5>Peki Neden Biz ?</h5>
                    <h2 class="area-title">Neden Hizmetlerimizi Tercih Etmelisiniz ?</h2>
                    <p>
                        Güncel teknolojileri yakından takip ederek en düşük maliyetli ve en hassas yöntemleri kullanarak en
                        iyi hizmeti vermeyi amaçlıyoruz.
                        Bunun yanında müşteri memnuniyetini en üst seviyede tutarak müşterilerimizin ihtiyaçlarına en iyi
                        şekilde cevap veriyoruz.
                    </p>
                    <ul>
                        <li>Alanında Uzman Mühendis Kadrosu</li>
                        <li>Doğruluk ve Hassasiyet Odaklı Çalışma</li>
                    </ul>
                    <div class="contact">
                        <p>
                            Daha detaylı bilgi almak için arayın.
                        </p>
                        <h5><i class="fas fa-phone"></i> {{ config('setting.contact.phone') }}</h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="thumb wow fadeInRight" data-wow-delay="0.6s"
                        style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInRight;">
                        <img src="{{ asset('assets/img/about.gif') }}" alt="Thumb">
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('layout.counter')
    <div class="clients-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="clients-carousel owl-carousel owl-theme">
                        @foreach ($references as $reference)
                            <a href="{{ $reference->url }}"><img src="{{ $reference->getImageUrl() }}" alt="Client"></a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
