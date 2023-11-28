<div class="fun-fact-area text-light text-center default-padding bg-gradient">
    <div class="container">
        <div class="fun-fact-items">
            <div class="row">
                <div class="col-lg-3 col-md-6 item">
                    <div class="fun-fact">
                        <div class="counter">
                            <div class="timer" data-to="{{ (int) __('front/counter.year_number') }}" data-speed="10000">
                                {{ __('front/counter.year_number') }}</div>
                        </div>
                        <span class="medium">{{ __('front/counter.year_text') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 item">
                    <div class="fun-fact">
                        <div class="counter">
                            <div class="timer" data-to="{{ (int) __('front/counter.project_number') }}"
                                data-speed="10000">
                                {{ __('front/counter.project_number') }}</div>
                            <div class="operator">+</div>
                        </div>
                        <span class="medium">{{ __('front/counter.project_text') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 item">
                    <div class="fun-fact">
                        <div class="counter">
                            <div class="timer" data-to="{{ (int) __('front/counter.area_number') }}" data-speed="10000">
                                {{ __('front/counter.area_number') }}</div>
                            <div class="operator">+</div>
                        </div>
                        <span class="medium">{{ __('front/counter.area_text') }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 item">
                    <div class="fun-fact">
                        <div class="counter">
                            <div class="timer" data-to="{{ (int) __('front/counter.satisfied') }}" data-speed="10000">
                                {{ __('front/counter.satisfied') }}
                            </div>
                            <div class="operator">%</div>
                        </div>
                        <span class="medium">{{ __('front/counter.satisfied_text') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
