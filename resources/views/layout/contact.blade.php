<div class="contact-area bg-gray half-bg default-padding">
    <div class="container">
        <div class="contact-box">
            <div class="row">
                <div class="col-lg-5 left-info">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="info">
                            <h5>Office Location</h5>
                            <p>
                                {{ config("setting.contact.address") }}
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info">
                            <h5>Phone</h5>
                            <p>
                                {{ config("setting.contact.phone") }}
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-envelope-open"></i>
                        </div>
                        <div class="info">
                            <h5>Email</h5>
                            <p>
                                {{ config("setting.contact.email") }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="content">
                        <div class="heading">
                            <h2>Nasıl Yardımcı Olabiliriz ?</h2>
                            <p>Hizmetlerimiz Hakkında Bilgi Almak İçin İletişime Geçin</p>
                        </div>
                        <form action="assets/mail/contact.php" method="POST" class="contact-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name"
                                            type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*"
                                            type="email">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone"
                                            type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comments" name="comments" placeholder="Please describe what you need."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" id="submit">
                                        Get a free consultation
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-md-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>