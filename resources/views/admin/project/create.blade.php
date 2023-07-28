@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.create"))
@section('content')
    @include('admin.layout.langTabs')
    {!! Form::open(['route' => "admin.{$route}.store", 'method' => 'post', 'files' => true]) !!}
    {!! Form::file('image', ['class' => 'dropify']) !!}
    <div class="tab-content">
        @foreach (languageList() as $key => $lang)
            <div id="{{ $lang->code }}" class="tab-pane fade @if ($loop->first) active show @endif">
                <div class="form-group">
                    {!! Form::label('title', __("admin/{$folder}.form.title")) !!} <span class="manitory">*</span>
                    {!! Form::text("title[$lang->code]", null, ['placeholder' => __("admin/{$folder}.form.title_placeholder")]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', __("admin/{$folder}.form.description")) !!}
                    {!! Form::textarea("description[$lang->code]", null, ['class' => 'editor']) !!}
                </div>
                <div class="form-group">
                    {{ Form::label('features', __("admin/{$folder}.form.features")) }}
                    {{ Form::textarea("features[$lang->code]", null, ['placeholder' => __("admin/{$folder}.form.features_placeholder")]) }}
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('start_date', __("admin/{$folder}.form.start_date")) !!}
                {!! Form::date('start_date', null) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('end_date', __("admin/{$folder}.form.end_date")) !!}
                {!! Form::date('end_date', null) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('video', __("admin/{$folder}.form.video")) !!}
                {!! Form::text('video', null, ['placeholder' => __("admin/{$folder}.form.video_placeholder")]) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('3d', __("admin/{$folder}.form.3d")) !!}
                {!! Form::text('3d', null, ['placeholder' => __("admin/{$folder}.form.3d_placeholder")]) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('category', __("admin/{$folder}.form.category")) !!}
        {!! Form::select('category_id', $categories, null) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
        {!! Form::select('status', statusList(), 'default') !!}
    </div>
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
