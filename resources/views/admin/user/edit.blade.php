@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.create"))
@section('content')
{!! Form::open(['url' => route("admin.{$route}.update",$user), 'method' => 'put']) !!}
<div class="form-group">
    {!! Form::label('name', __("admin/{$folder}.form.name")) !!}
    {!! Form::text('name', $user->name, ['placeholder' => __("admin/{$folder}.form.name_placeholder")]) !!}
</div>
<div class="form-group">
    {!! Form::label('email', __("admin/{$folder}.form.email")) !!}
    {!! Form::email('email', $user->email, ['placeholder' => __("admin/{$folder}.form.email_placeholder")]) !!}
</div>
<div class="form-group">
    {!! Form::label('password', __("admin/{$folder}.form.password")) !!}
    {!! Form::password('password', null, ['placeholder' => __("admin/{$folder}.form.password_placeholder")]) !!}
</div>
<div class="form-group">
    {!! Form::label('role', __("admin/{$folder}.form.role")) !!}
    {!! Form::select('role', $roles, $user->role->value) !!}
</div>
{!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection
