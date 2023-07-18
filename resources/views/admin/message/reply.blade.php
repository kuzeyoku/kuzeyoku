@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.reply"))
@section('content')
    {!! Form::open(['url' => route("admin.{$route}.send"), 'method' => 'post']) !!}
    {!! Form::hidden('id', $message->id) !!}
    <div class="form-group">
        {!! Form::label('email', __("admin/{$folder}.form.customer")) !!}
        {!! Form::text('email', $message->email, ['disabled' => '']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('subject', __("admin/{$folder}.form.subject")) !!}
        {!! Form::text('subject', 're:' . $message->subject) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', __("admin/{$folder}.form.content")) !!}
        {!! Form::textarea('content', null, ['class' => 'editor']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit(__("admin/{$folder}.form.send"), ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
