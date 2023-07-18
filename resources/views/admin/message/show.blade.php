@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.show"))
@section('content')
    <img class="avatar-sm" src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/512/user-male-icon.png">
    <div>{{ $message->name }}</div>
    <small class="text-muted">
        {{ __("admin/{$folder}.email") }} {{ $message->email }} |
        {{ __("admin/{$folder}.phone") }} {{ $message->phone }} |
        {{ __("admin/{$folder}.ip") }} {{ $message->ip }}
    </small>
    <hr>
    <h4 class="mb-3">{{ $message->subject }}</h4>
    {{ $message->content }}
    <hr>
    <a class="btn btn-primary" href="{{ route("admin.{$route}.reply", $message) }}">
        @svg('ri-reply-fill') {{ __("admin/{$folder}.reply") }}
    </a>
    <button class="btn btn-danger destroy-btn" data-id="{{ $message->id }}">
        @svg('ri-delete-bin-2-fill') {{ __('admin/general.delete') }}
    </button>
    {!! Form::open([
        'url' => route("admin.{$route}.destroy", $message),
        'method' => 'delete',
        'id' => 'form_' . $message->id,
    ]) !!}
    {!! Form::close() !!}
@endsection
