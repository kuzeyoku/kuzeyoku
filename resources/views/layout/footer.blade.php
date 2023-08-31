<footer class="bg-dark text-light">
    <div class="fixed-shape">
        <img src="{{ asset('assets/img/shape/bg-3.png') }}" alt="Shape">
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-content">
                <div class="row align-center">
                    <div class="col-lg-7">
                        <ul>
                            <li><a href="#">Membership</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <form action="#">
                            <input type="email" placeholder="Your Email" class="form-control" name="email">
                            <button type="submit"> <i class="fa fa-paper-plane"></i></button>
                        </form>
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
                                @if (config('setting.social.linkedin'))
                                    <li>
                                        <a href="{{ config('setting.social.linkedin') }}">
                                            <i class="fab fa-linkedin-in"></i>
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
                <div class="col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Company</h4>
                        <ul>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Meet Our Team</a>
                            </li>
                            <li>
                                <a href="#">News & Media</a>
                            </li>
                            <li>
                                <a href="#">Case Studies</a>
                            </li>
                            <li>
                                <a href="#">Contact Us</a>
                            </li>
                            <li>
                                <a href="#">Investors</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Solutions</h4>
                        <ul>
                            <li>
                                <a href="#">IT Management</a>
                            </li>
                            <li>
                                <a href="#">Cyber Security</a>
                            </li>
                            <li>
                                <a href="#">Cloud Computing</a>
                            </li>
                            <li>
                                <a href="#">IT Consulting</a>
                            </li>
                            <li>
                                <a href="#">Software Dev</a>
                            </li>
                            <li>
                                <a href="#">Backup & Recovery</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 item">
                    <div class="f-item">
                        <h4 class="widget-title">İletişim Bilgilerimiz</h4>
                        <div class="address">
                            <ul>
                                <li>
                                    <strong>Address:</strong>
                                    {{ config('setting.contact.address') }}
                                </li>
                                <li>
                                    <strong>Email:</strong>
                                    <a
                                        href="mailto:{{ config('setting.contact.email') }}">{{ config('setting.contact.email') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="download">
                            <h5>Download</h5>
                            <a href="#"><i class="fab fa-apple"></i> App Store</a>
                            <a href="#"><i class="fab fa-google-play"></i> Google Play</a>
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
                    <p>Copyright &copy; {{ date('Y') }}. Designed by <a href="#">Babazan Software</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
