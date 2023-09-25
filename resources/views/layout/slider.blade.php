<div class="banner-area text-center top-pad-80 inc-shape text-large">
    <div id="bootcarousel" class="carousel text-light slide carousel-fade animate_text" data-ride="carousel">
        <div class="carousel-inner carousel-zoom">
            @foreach ($sliders as $slider)
            <div class="carousel-item @if ($loop->first) active @endif">
                <div class="slider-thumb bg-cover" style="background-image: url({{ $slider->getImageUrl() }});">
                </div>
                <div class="box-table">
                    <div class="box-cell shadow dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="content">
                                        <h2 data-animation="animated slideInRight">
                                            @php
                                            $title = explode('*', $slider->getTitle());
                                            @endphp
                                            @if (count($title) == 1)
                                            {{ $title[0] }}
                                            @else
                                            {{ $title[0] }}<strong>{{ $title[1] }}</strong>
                                            @endif
                                        </h2>
                                        <p data-animation="animated slideInLeft">
                                            {{ $slider->getDescription() }}
                                        </p>
                                        @if ($slider->video)
                                        <a class="popup-youtube relative video-play-button" href="{{ $slider->video }}">
                                            <i class="fa fa-play"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="left carousel-control light" href="#bootcarousel" data-slide="prev">
            @svg('fas-arrow-left')
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control light" href="#bootcarousel" data-slide="next">
            @svg('fas-arrow-right')
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
