<footer class="bg-dark text-light">
    <div class="fixed-shape">
        <img src="{{ asset('assets/img/shape/bg-3.png') }}" alt="Shape">
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-content">
                <div class="row align-center">
                    <div class="col-lg-6">
                        <ul>
                            <li><a href="{{ route('service.index') }}">{{ __('front/service.page_title') }}</a></li>
                            <li><a href="{{ route('project.index') }}">{{ __('front/project.page_title') }}</a></li>
                            <li><a href="{{ route('blog.index') }}">{{ __('front/blog.page_title') }}</a></li>
                            <li><a href="{{ route('contact.index') }}"> {{ __('front/contact.page_title') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        {{ Form::open(['url' => route('newsletter.store'), 'method' => 'POST', 'id' => 'newsletter-form']) }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('front/contact.form_email_placeholder'), 'required' => '']) }}
                        <button type="submit" class="g-recaptcha"
                            data-sitekey="{{ config('setting.recaptcha.site_key') }}" data-callback="newsletter"
                            data-action="submit">@svg('fas-paper-plane')</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="f-items default-padding">
            <div class="row">
                <div class="col-lg-4 col-md-6 item">
                    <div class="f-item about">
                        <img src="{{ asset('assets/img/logo-light.png') }}" alt="Logo">
                        <p>
                            {{ config('setting.general.description') }}
                        </p>
                        <div class="social">
                            <ul>
                                @if (config('setting.social.facebook'))
                                    <li>
                                        <a href="{{ config('setting.social.facebook') }}">
                                            @svg('fab-facebook')
                                        </a>
                                    </li>
                                @endif
                                @if (config('setting.social.twitter'))
                                    <li>
                                        <a href="{{ config('setting.social.twitter') }}">
                                            @svg('fab-twitter')
                                        </a>
                                    </li>
                                @endif
                                @if (config('setting.social.instagram'))
                                    <li>
                                        <a href="{{ config('setting.social.instagram') }}">
                                            @svg('fab-instagram')
                                        </a>
                                    </li>
                                @endif
                                @if (config('setting.social.linkedin'))
                                    <li>
                                        <a href="{{ config('setting.social.linkedin') }}">
                                            @svg('fab-linkedin')
                                        </a>
                                    </li>
                                @endif
                                @if (config('setting.social.youtube'))
                                    <li>
                                        <a href="{{ config('setting.social.youtube') }}">
                                            @svg('fab-youtube')
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">{{ __('front/footer.pages') }}</h4>
                        <ul>
                            @foreach ($pages as $page)
                                <li>
                                    <a href="{{ $page->getUrl() }}">{{ $page->getTitle() }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">{{ __('front/footer.services') }}</h4>
                        <ul>
                            @foreach ($services as $service)
                                <li>
                                    <a href="{{ $service->getTitle() }}">{{ $service->getTitle() }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 item">
                    <div class="f-item">
                        <h4 class="widget-title">{{ __('front/footer.contact') }}</h4>
                        <div class="address">
                            <ul>
                                <li>
                                    <strong>{{ __('front/footer.contact_address') }}:</strong>
                                    {{ config('setting.contact_address') }}
                                </li>
                                <li>
                                    <strong>{{ __('front/footer.contact_email') }}:</strong>
                                    <a
                                        href="mailto:{{ config('setting.contact_email') }}">{{ config('setting.contact_email') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>{{ __('front/footer.copyright', ['date' => date('Y')]) }} <a
                            href="#">{{ env('APP_NAME') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
