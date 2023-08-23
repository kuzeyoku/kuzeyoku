<div class="case-studies-area bg-gray default-padding-bottom default-padding">
    <!-- Fixed BG -->
    <div class="fixed-shape-top">
        <img src="assets/img/shape/bg-7.png" alt="Shape">
    </div>
    <!-- End Fixed BG -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h2 class="area-title">Projelerimiz</h2>
                    <div class="devider"></div>
                    <p>
                        Yapımı devam eden yada tamamladığımız projelerimizi 3D olarak inceleyebilirsiniz..
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fill">
        <div class="case-carousel text-center text-light owl-carousel owl-theme">
            @foreach ($projects as $project)
                <div class="item">
                    <div class="thumb">
                        <img src="{{ $project->getImageUrl() }}" alt="Thumb">
                    </div>
                    <div class="info">
                        <div class="tags">
                            <a href="#">{{ $project->category }}</a>
                        </div>
                        <h4>
                            <a href="#">{{ $project->getTitle() }}</a>
                        </h4>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
