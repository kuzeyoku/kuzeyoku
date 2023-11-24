@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.create"))
@section('content')
    @include('admin.layout.langTabs')
    {!! Form::open(['route' => "admin.{$route}.store", 'method' => 'post', 'files' => true]) !!}
    <div class="d-flex align-content-center flex-wrap">
        <div class="form-group" style="margin-right: 20px">
            {!! Form::label('thumbnail', __("admin/$folder.form.thumbnail")) !!}
            {!! Form::file('thumbnail', ['class' => 'dropify']) !!}
        </div>
        <div class="form-group" style="margin-right: 20px">
            {!! Form::label('image', __("admin/{$folder}.form.image")) !!}
            {!! Form::file('image', ['class' => 'dropify']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('brochure', __("admin/{$folder}.form.brochure")) !!}
            {!! Form::file('brochure', ['class' => 'dropify', 'accept' => '.pdf']) !!}
        </div>
    </div>
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
                    {{ Form::label('shortdescription', __("admin/{$folder}.form.shortdescription")) }}
                    {{ Form::text("shortdescription[$lang->code]", null, ['placeholder' => __("admin/{$folder}.form.shortdescription_placeholder")]) }}
                </div>
                {{-- <div class="form-group">
                    {{ Form::label('features', __("admin/{$folder}.form.features")) }}
                    {{ Form::textarea("features[$lang->code]", null, ['placeholder' => __("admin/{$folder}.form.features_placeholder")]) }}
                </div> --}}
            </div>
        @endforeach
    </div>
    {{-- <div class="row">
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
    </div> --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('video', __("admin/{$folder}.form.video")) !!}
                {!! Form::text('video', null, ['placeholder' => __("admin/{$folder}.form.video_placeholder")]) !!}
            </div>
        </div>
    </div>
    {{-- <div class="form-group">
        {!! Form::label('category', __("admin/{$folder}.form.category")) !!}
        {!! Form::select('category_id', $categories, null) !!}
    </div> --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('order', __('admin/general.order')) !!} <span class="manitory">*</span>
                {!! Form::number('order', 0, ['placeholder' => __('admin/general.order_placeholder')]) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
                {!! Form::select('status', statusList(), 'default') !!}
            </div>
        </div>
    </div>
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
