<div class="top-bar-area inc-pad transparent text-light">
    <div class="container-full">
        <div class="row align-center">
            <div class="col-lg-6 info">
                <ul>
                    <li>
                        <i class="fas fa-phone"></i>{{ config('setting.contact.phone') }}
                    </li>
                    <li>
                        <i class="fas fa-envelope-open"></i>{{ config('setting.contact.email') }}
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
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                        @endif
                        @if (config('setting.social.twitter'))
                            <li>
                                <a href="{{ config('setting.social.twitter') }}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                        @endif
                        @if (config('setting.social.instagram'))
                            <li>
                                <a href="{{ config('setting.social.instagram') }}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        @endif
                        @if (config('setting.social.linkedin'))
                            <li>
                                <a href="{{ config('setting.social.linkedin') }}">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        @endif
                        @if (config('setting.social.youtube'))
                            <li>
                                <a href="{{ config('setting.social.youtube') }}">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
