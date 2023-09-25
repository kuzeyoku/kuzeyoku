<div class="choose-us-area overflow-hidden reverse default-padding-bottom">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6 info wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <h5>{{ __('front/chose.title') }}</h5>
                <h2 class="area-title">{{ __('front/chose.description') }}</h2>
                <p>
                    {{ __('front/chose.text') }}
                </p>
                <ul>
                    <li>@svg('fas-check-square') {{ __('front/chose.article_1') }}</li>
                    <li>@svg('fas-check-square') {{ __('front/chose.article_2') }}</li>
                </ul>
                <div class="contact">
                    <p>
                        {{ __('front/chose.call') }}
                    </p>
                    <h5>@svg("fas-phone") {{ config('setting.contact.phone') }}</h5>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="thumb wow fadeInRight" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInRight;">
                    <img src="{{ asset('assets/img/about.gif') }}" alt="Thumb">
                </div>
            </div>

        </div>
    </div>
</div>
