<div class="services-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    {{-- <h5>Hizmetlerimiz</h5> --}}
                    <h2 class="area-title">Hizmetlerimiz</h2>
                    <div class="devider"></div>
                    <p>
                        Hassasiyet gerektiren işlerinizi önemsiyor ve en kaliteli hizmetleri sunmaya çalışıyoruz.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="services-content text-center">
            <div class="row">
                @foreach ($services as $service)
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item">
                            <img src="{{ $service->getImageUrl() }}" alt="Thumb">
                            <h5><a href="{{ $service->getUrl() }}">{{ $service->getTitle() }}</a></h5>
                            {{-- <p>
                                {!! Str::limit($service->getDescription(true), 90, '...') !!}
                            </p> --}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="bottom-content text-center">
                <p>
                    Bazı işler için fazla para ve zaman harcamayı bırakın <a href="{{ route('service.index') }}">Diğer
                        hizmetlerimize göz atın.</a>
                </p>
            </div>
        </div>
    </div>
</div>
