<div class="about-area half-bg bg-gray default-padding-bottom default-padding overflow-hidden">
    <div class="container">
        <div class="about-content">
            <div class="row">
                <div class="col-lg-7 info">
                    <div class="top-info">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="item">
                                    <div class="title">
                                        <i class="flaticon-target"></i>
                                        <h4>Misyonumuz</h4>
                                    </div>
                                    <p>
                                        Misyonumuz, müşterilerimizin ihtiyaçlarına ve beklentilerine en iyi şekilde cevap vererek, onlara değer katmaktır.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="item">
                                    <div class="title">
                                        <i class="flaticon-vision-1"></i>
                                        <h4>Vizyonumuz</h4>
                                    </div>
                                    <p>
                                        Vizyonumuz, dünya çapında lider bir firma olmak ve yenilikçi ürünler ve hizmetlerle müşterilerimizin ihtiyaçlarını karşılamaktır.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-info">
                        <h2>Hep En İyisini Tercih Ediyoruz</h2>
                        <div class="clients-carousel-3-col owl-carousel owl-theme">
                            @foreach ($brands as $brand)
                                <a href="{{ $brand->url }}"><img src="{{ $brand->getImageUrl() }}"
                                        alt="{{ $brand->title }}"></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 thumbs">
                    <div class="thumb-items">
                        <img src="assets/img/about.gif" alt="Thumb">
                        {{-- <div class="video">
                            <a href="../../watch.html?v=owhuBrGIOsE" class="popup-youtube">
                                <div class="relative theme video-play-button item-center">
                                    <i class="fa fa-play"></i>
                                </div>
                                <span>Watch Our Story</span>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
