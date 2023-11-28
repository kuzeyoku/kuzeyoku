{{-- <div class="services-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h2 class="area-title">{{ __('front/service.home_title') }}</h2>
                    <div class="devider"></div>
                    <p>
                        {{ __('front/service.home_description') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="services-content text-center">
            <div class="row">
                @foreach ($service as $service)
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item">
                            <img src="{{ $service->getImageUrl() }}" alt="{{ $service->getTitle() }}">
                            <h5><a class="text-nowrap" href="{{ $service->getUrl() }}">{{ $service->getTitle() }}</a></h5>
                            <p>
                                {!! Str::limit($service->getDescription(), 90, '...') !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="bottom-content text-center">
                <p>
                    {{ __('front/service.other_service_description') }}
                    <a href="{{ route('service.index') }}">
                        {{ __('front/service.other_service_link_title') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</div> --}}


<div class="case-studies-area overflow-hidden grid-items default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h2 class="area-title">{{ __('front/service.home_title') }}</h2>
                    <div class="devider"></div>
                    <p>
                        {{ __('front/service.home_description') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="case-items-area">
            <div class="masonary">
                <div id="portfolio-grid" class="case-items row">
                    @foreach ($service as $service)
                        <div class="col-lg-4 mb-4">
                            <div class="pf-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ $service->getImageUrl() }}" alt="Thumb">
                                    </div>
                                    <div class="info">
                                        <h4>
                                            <a href="{{ $service->getUrl() }}">{{ $service->getTitle() }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
