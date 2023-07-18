@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.create"))
@section('content')
    {!! Form::open(['route' => "admin.{$route}.store", 'method' => 'post', 'files' => true]) !!}
    {!! Form::file('image', ['class' => 'dropify']) !!}
    <div class="form-group">
        {!! Form::label('name', __("admin/{$folder}.form.name")) !!}
        {!! Form::text('name', null, ['placeholder' => __("admin/{$folder}.form.name_placeholder")]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('company', __("admin/{$folder}.form.company")) !!}
        {!! Form::text('company', null, ['placeholder' => __("admin/{$folder}.form.company_placeholder")]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('position', __("admin/{$folder}.form.position")) !!}
        {!! Form::text('position', null, ['placeholder' => __("admin/{$folder}.form.position_placeholder")]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('message', __("admin/{$folder}.form.message")) !!}
        {!! Form::textarea('message', null, ['placeholder' => __("admin/{$folder}.form.message_placeholder")]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
        {!! Form::select('status', statusList(), 'default') !!}
    </div>
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
