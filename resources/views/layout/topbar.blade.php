<div class="top-bar-area inc-pad transparent text-light">
    <div class="container-full">
        <div class="row align-center">
            <div class="col-lg-6 info">
                <ul>
                    <li>
                        @svg("ri-phone-fill") {{ config('setting.contact.phone') }}
                    </li>
                    <li>
                        @svg("ri-mail-open-fill") {{ config('setting.contact.email') }}
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 text-right item-flex">
                {{-- <div class="info">
                    <ul>
                        <li>
                            <i class="fas fa-clock"></i>{{ date('d/m/y H:i') }}
                </li>
                </ul>
            </div> --}}
            <div class="social">
                <ul>
                    @if (config('setting.social.facebook'))
                    <li>
                        <a href="{{ config('setting.social.facebook') }}">
                            @svg("ri-facebook-fill")
                        </a>
                    </li>
                    @endif
                    @if (config('setting.social.twitter'))
                    <li>
                        <a href="{{ config('setting.social.twitter') }}">
                            @svg("ri-twitter-fill")
                        </a>
                    </li>
                    @endif
                    @if (config('setting.social.instagram'))
                    <li>
                        <a href="{{ config('setting.social.instagram') }}">
                            @svg("ri-instagram-line")
                        </a>
                    </li>
                    @endif
                    @if (config('setting.social.linkedin'))
                    <li>
                        <a href="{{ config('setting.social.linkedin') }}">
                            @svg("ri-linkedin-fill")
                        </a>
                    </li>
                    @endif
                    @if (config('setting.social.youtube'))
                    <li>
                        <a href="{{ config('setting.social.youtube') }}">
                            @svg("ri-youtube-fill")
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
