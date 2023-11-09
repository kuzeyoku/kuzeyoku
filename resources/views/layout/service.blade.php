<div class="services-area default-padding">
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
                            <h5><a href="{{ $service->getUrl() }}">{{ $service->getTitle() }}</a></h5>
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
</div>
