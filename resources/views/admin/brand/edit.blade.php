@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.edit"))
@section('content')
    {!! Form::open(['url' => route("admin.{$route}.update", $brand), 'method' => 'put', 'files' => true]) !!}
    {!! Form::file('image', [
        'class' => 'dropify',
        'data-default-file' => uploadFolder($folder, $brand->image),
    ]) !!}
    <div class="form-group">
        {!! Form::label('url', __("admin/{$folder}.form.url")) !!}
        {!! Form::text('url', $brand->url, ['placeholder' => "admin/{$folder}.form.url_placeholder"]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
        {!! Form::select('status', statusList(), $brand->status, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
