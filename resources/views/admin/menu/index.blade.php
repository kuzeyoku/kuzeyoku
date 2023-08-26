@extends('admin.layout.main')
@section('pageTitle', 'Menü Yönetimi')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Menü Ekle
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => "admin.{$route}.store", 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('title', __("admin/{$folder}.form.title")) !!}
                        {!! Form::text('title', null, ['placeholder' => __("admin/{$folder}.form.title_placeholder")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', __("admin/{$folder}.form.url")) !!}
                        {!! Form::text('url', null, ['placeholder' => __("admin/{$folder}.form.url_placeholder")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('order', __("admin/{$folder}.form.order")) !!}
                        {!! Form::number('order', null, ['placeholder' => __("admin/{$folder}.form.order_placeholder")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('parent', __("admin/{$folder}.form.parent")) !!}
                        {!! Form::select('parent_id', $parentList, null, ['placeholder' => 'Seçiniz']) !!}
                    </div>
                    {!! Form::hidden('type', $type) !!}
                    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Menü İçeriği
                </div>
            </div>
        </div>
    </div>
@endsection
