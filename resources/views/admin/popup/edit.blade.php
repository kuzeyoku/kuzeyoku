@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.edit"))
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/izimodal.min.css') }}">
@endsection
@section('button')
    <button class="btn btn-sm btn-primary" id="#modal"
        data-izimodal-open="#modal">{{ __('admin/general.preview') }}</button>
@endsection
@section('content')
    @include('admin.layout.langTabs')
    <p>{{ __("admin/{$folder}.info") }}</p>
    {!! Form::open(['url' => route("admin.{$route}.update", $popup), 'method' => 'put', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('type', __("admin/{$folder}.form.type")) !!}
        {!! Form::select(
            'type',
            [
                'image' => __("admin/{$folder}.type.image"),
                'text' => __("admin/{$folder}.type.text"),
                'video' => __("admin/{$folder}.type.video"),
            ],
            $popup->type,
        ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', __("admin/{$folder}.form.image")) !!}
        {!! Form::file('image', [
            'class' => 'dropify',
            'data-default-file' => uploadFolder($folder, $popup->image),
        ]) !!}
    </div>
    <div class="tab-content">
        @foreach (languageList() as $key => $lang)
            <div id="{{ $lang->code }}" class="tab-pane fade @if ($loop->first) active show @endif">
                <div class="form-group">
                    {!! Form::label('title', __("admin/{$folder}.form.title")) !!} <span class="manitory">*</span>
                    {!! Form::text("title[$lang->code]", $popup->title[$lang->code] ?? null, [
                        'placeholder' => __("admin/{$folder}.form.title_placeholder"),
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('message', __("admin/{$folder}.form.message")) !!}
                    {!! Form::textarea("message[$lang->code]", $popup->message[$lang->code] ?? null) !!}
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('time', __("admin/{$folder}.form.time")) !!}
                {!! Form::number('time', $popup->time, ['placeholder' => __("admin/{$folder}.form.time_placeholder")]) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('width', __("admin/{$folder}.form.width")) !!}
                {!! Form::number('width', $popup->width, ['placeholder' => __("admin/{$folder}.form.width_placeholder")]) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('url', __("admin/{$folder}.form.url")) !!}
                {!! Form::url('url', $popup->url, ['placeholder' => __("admin/{$folder}.form.url_placeholder")]) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('video', __("admin/{$folder}.form.video")) !!}
                {!! Form::url('video', $popup->video, ['placeholder' => __("admin/{$folder}.form.video_placeholder")]) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('closeButton', __("admin/{$folder}.form.closeButton")) !!}
                {!! Form::select('closeButton', App\Enums\StatusEnum::getYesNoSelectArray(), $popup->closeButton) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('closeOnEscape', __("admin/{$folder}.form.closeOnEscape")) !!}
                {!! Form::select('closeOnEscape', App\Enums\StatusEnum::getYesNoSelectArray(), $popup->closeOnEscape) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('overlayClose', __("admin/{$folder}.form.overlayClose")) !!}
                {!! Form::select('overlayClose', App\Enums\StatusEnum::getYesNoSelectArray(), $popup->overlayClose) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('pauseOnHover', __("admin/{$folder}.form.pauseOnHover")) !!}
                {!! Form::select('pauseOnHover', App\Enums\StatusEnum::getYesNoSelectArray(), $popup->pauseOnHover) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('fullScreenButton', __("admin/{$folder}.form.fullScreenButton")) !!}
                {!! Form::select('fullScreenButton', App\Enums\StatusEnum::getYesNoSelectArray(), $popup->fullScreenButton) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('color', __("admin/{$folder}.form.color")) !!}
                {!! Form::text('color', $popup->color, ['placeholder' => __("admin/{$folder}.form.color_placeholder")]) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
        {!! Form::select('status', statusList(), $popup->status) !!}
    </div>
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::submit(__('admin/general.saveAndContinue'), [
        'name' => 'saveAndContinue',
        'class' => 'btn btn-success',
    ]) !!}
    {!! Form::close() !!}
@endsection
@section('script')
    <div id="modal">
        @if ($popup->type == 'image')
            <img onerror="this.style.display='none'" src="{{ uploadFolder($folder, $popup->image) }}"
                alt="{{ $popup->title[app()->getLocale()] }}">
        @elseif ($popup->type == 'text')
            <p class="p-3">{{ $popup->message[app()->getLocale()] }}</p>
        @elseif ($popup->type == 'video')
            <video src="{{ $popup->video }}" controls></video>
        @endif
    </div>
    <script src="{{ asset('assets/admin/js/izimodal.min.js') }}"></script>
    @include("admin.$folder.modal-init")
@endsection
