@extends('layout.main')
@section('title', __('front/education.page_title'))
@section('content')
    @include('layout.breadcrumb')
    <div class="blog-area default-padding-bottom default-padding-top">
        <div class="container">
            <div class="blog-items">
                <div class="alert alert-success">Firmamızdan Aldığınız Sertifikanızı Sorulamak İçin <strong><a
                            href="http://ihaakademisi.com/SertifikaYonetim/">Buraya Tıklayın</a></strong>
                </div>
                <div class="alert alert-warning">Firmamız Tarafından Düzenlenen Eğitimlere Katılmak ve Başvuru Yapmak İçin
                    <strong><a href="{{ route("education.application") }}">Buraya Tıklayın</a></strong>
                </div>
                <div class="row">
                    @foreach ($educations as $education)
                        <div class="single-item col-lg-4">
                            <div class="item">
                                <div class="education-thumb">
                                    <img src="{{ $education->getImageUrl() }}" alt="Thumb">
                                </div>
                                <div class="education-info">
                                    <h4>
                                        <a href="{{ $education->getUrl() }}">{{ $education->getTitle() }}</a>
                                    </h4>
                                    <p>
                                        {!! Str::limit(strip_tags($education->getDescription()), 160) !!}
                                    </p>
                                    <a class="btn-more"
                                        href="{{ $education->getUrl() }}">{{ __('front/education.detail') }}<i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
