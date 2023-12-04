@extends('layout.main')
@section('title', __('front/education.application.page_title'))
@section('content')
    @include('layout.breadcrumb')
    <div class="about-area center-responsive default-padding">
        <div class="container">
            <h2>{{ __('front/education.form_title') }}</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-lg-7">
                    {{ Form::open(['url' => route('education.application'), 'method' => 'POST', 'id' => 'education-form']) }}
                    <div class="form-group">
                        {{ Form::label(__('front/education.name')) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('front/education.name'), 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label(__('front/education.surname')) }}
                        {{ Form::text('surname', null, ['class' => 'form-control', 'placeholder' => __('front/education.surname'), 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label(__('front/education.phone')) }}
                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('front/education.phone'), 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label(__('front/education.email')) }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('front/education.email'), 'required' => '']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label(__('front/education.education_type')) }}
                        {{ Form::select('type', $educationTypes, 'default', ['class' => 'form-control', 'placeholder' => __('admin/general.select'), 'required' => '']) }}
                        <strong>{{ __('front/education.education_type_description') }}</strong>
                    </div>
                    {{ Form::submit(__('front/education.send'), [
                        'class' => 'btn btn-primary g-recaptcha',
                        'data-sitekey' => config('setting.recaptcha.site_key'),
                        'data-callback' => 'education',
                        'data-action' => 'submit',
                    ]) }}
                    {{ Form::close() }}
                </div>
                <div class="col-lg-5">
                    <img class="border" src="{{ asset('assets/img/education_form.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
