@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.create"))
@section('content')
    {!! Form::open(['route' => "admin.{$route}.store", 'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::label('name', __("admin/{$folder}.form.name")) !!}
        {!! Form::text('name', null, ['placeholder' => __("admin/{$folder}.form.name_placeholder")]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', __("admin/{$folder}.form.email")) !!}
        {!! Form::email('email', null, ['placeholder' => __("admin/{$folder}.form.email_placeholder")]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', __("admin/{$folder}.form.password")) !!}
        {!! Form::password('password', ['placeholder' => __("admin/{$folder}.form.password_placeholder")]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', __("admin/{$folder}.form.password_confirmation")) !!}
        {!! Form::password('password_confirmation', [
            'placeholder' => __("admin/{$folder}.form.password_confirmation_placeholder"),
        ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role', __("admin/{$folder}.form.role")) !!}
        {!! Form::select('role', $roles, "default") !!}
    </div>
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
