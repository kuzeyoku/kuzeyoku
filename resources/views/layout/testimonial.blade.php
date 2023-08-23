<div class="testimonials-area carousel-shadow default-padding-bottom default-padding">
    <div class="container">
        <div class="heading-left">
            <div class="row">
                <div class="col-lg-6">
                    {{-- <h5>Our Client's Review </h5> --}}
                    <h2>
                        Müşterilerimiz ne diyor?
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonials-carousel owl-carousel owl-theme">
                    @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ $testimonial->getImageUrl() }}" alt="Thumb">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="info">
                                <p>
                                    {{ Str::limit($testimonial->message, 110) }}
                                </p>
                                <div class="bottom">
                                    <div class="provider">
                                        <h5>{{ $testimonial->name }}</h5>
                                        <span>{{ $testimonial->company }} / {{ $testimonial->position }}</span>
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
