<div class="case-studies-area bg-gray default-padding-bottom default-padding">
    <div class="fixed-shape-top">
        <img src="{{ asset('assets/img/shape/bg-7.png') }}">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h2 class="area-title">{{ __('front/project.home_title') }}</h2>
                    <div class="devider"></div>
                    <p>
                        {{ __('front/project.home_description') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fill">
        <div class="case-carousel text-center text-light owl-carousel owl-theme">
            @foreach ($project as $project)
                <div class="item">
                    <div class="thumb">
                        <img src="{{ $project->getImageUrl() }}" alt="Thumb">
                    </div>
                    <div class="info">
                        @if ($project->category)
                            <div class="tags">
                                # {{ $project->category->getTitle() }}
                            </div>
                        @endif
                        <h3>
                            <a href="{{ $project->getUrl() }}">{{ $project->getTitle() }}</a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
