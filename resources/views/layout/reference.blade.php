<div class="clients-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="clients-carousel owl-carousel owl-theme">
                    @foreach ($references as $reference)
                        <a href="{{ $reference->url }}"><img src="{{ $reference->getImageUrl() }}" alt="Client"></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
