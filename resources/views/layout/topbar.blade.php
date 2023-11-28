<div class="top-bar-area inc-pad bg-gradient text-light">
    <div class="container-full">
        <div class="row align-center">
            <div class="col-lg-6 info">
                <ul>
                    <li>
                        @svg("fas-phone") {{ config('setting.contact.phone') }}
                    </li>
                    <li>
                        @svg("fas-envelope") {{ config('setting.contact.email') }}
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 text-right item-flex">
                <div class="social">
                    <ul>
                        @if (config('setting.social.facebook'))
                        <li>
                            <a href="{{ config('setting.social.facebook') }}">
                                @svg("fab-facebook-square")
                            </a>
                        </li>
                        @endif
                        @if (config('setting.social.twitter'))
                        <li>
                            <a href="{{ config('setting.social.twitter') }}">
                                @svg("fab-twitter")
                            </a>
                        </li>
                        @endif
                        @if (config('setting.social.instagram'))
                        <li>
                            <a href="{{ config('setting.social.instagram') }}">
                                @svg("fab-instagram")
                            </a>
                        </li>
                        @endif
                        @if (config('setting.social.linkedin'))
                        <li>
                            <a href="{{ config('setting.social.linkedin') }}">
                                @svg("fab-linkedin")
                            </a>
                        </li>
                        @endif
                        @if (config('setting.social.youtube'))
                        <li>
                            <a href="{{ config('setting.social.youtube') }}">
                                @svg("fab-youtube")
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
