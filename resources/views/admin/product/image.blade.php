@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.images") . ' - ' . $product->title[app()->getLocale()])
@section('content')
    {!! Form::open([
        'url' => route("admin.{$folder}.image.store"),
        'class' => 'dropzone mb-3',
        'file' => true,
    ]) !!}
    {!! Form::hidden('product_id', $product->id) !!}
    {!! Form::close() !!}
    <div class="row">
        @foreach ($product->images as $image)
            <div class="col-md-2">
                <div class="p-2 border rounded position-relative">
                    <img src="{{ uploadFolder($folder, $image->image) }}" class="img-fluid">
                    {!! Form::open([
                        'url' => route("admin.{$route}.image.destroy", $image),
                        'method' => 'delete',
                        'class' => 'd-inline',
                    ]) !!}
                    <button type="submit"
                        class="btn btn-delete btn-sm position-absolute top-0 end-0 m-2">{{ __('admin/general.delete') }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    </div>
@endsection
