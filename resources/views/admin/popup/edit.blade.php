@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.create"))
@section('content')
    @include('admin.layout.langTabs')
    <p>{{ __("admin/{$folder}.info") }}</p>
    {!! Form::open(['url' => route("admin.{$route}.update", $popup), 'method' => 'put', 'files' => true]) !!}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('type', __("admin/{$folder}.form.type")) !!}
                {!! Form::select('type', [
                    'image' => __("admin/{$folder}.type.image"),
                    'text' => __("admin/{$folder}.type.text"),
                    'video' => __("admin/{$folder}.type.video"),
                ]) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('time', __("admin/{$folder}.form.time")) !!}
                {!! Form::number('time', $popup->time, ['placeholder' => __("admin/{$folder}.form.time_placeholder")]) !!}
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
                    {!! Form::text("title[$lang->code]", $popup->title[$lang->code] ?? null, ['placeholder' => __("admin/{$folder}.form.title_placeholder")]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('message', __("admin/{$folder}.form.message")) !!}
                    {!! Form::textarea("message[$lang->code]", $popup->message[$lang->code] ?? null, ['class' => 'editor']) !!}
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
        {!! Form::select('status', statusList(), $popup->status) !!}
    </div>
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
