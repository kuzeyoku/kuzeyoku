@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.edit"))
@section('content')
    @include('admin.layout.langTabs')
    {!! Form::open(['url' => route("admin.{$route}.update", $slider), 'method' => 'put', 'files' => true]) !!}
    {!! Form::file('image', [
        'class' => 'dropify',
        'data-default-file' => uploadFolder($folder, $slider->image),
    ]) !!}
    <div class="tab-content">
        @foreach (languageList() as $key => $lang)
            <div id="{{ $lang->code }}" class="tab-pane fade @if ($loop->first) active show @endif">
                <div class="form-group">
                    {!! Form::label('title', __("admin/{$folder}.form.title")) !!}
                    {!! Form::text("title[$lang->code]", $slider->title[$lang->code] ?? null, [
                        'placeholder' => __("admin/{$folder}.form.title_description"),
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', __("admin/{$folder}.form.description")) !!}
                    {!! Form::textarea("description[$lang->code]", $slider->description[$lang->code] ?? null, [
                        'placeholder' => __("admin/{$folder}.form.description_placeholder"),
                    ]) !!}
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('title_size', __("admin/{$folder}.form.title_size")) !!}
                {!! Form::number('title_size', $slider->title_size, [
                    'placeholder' => __("admin/{$folder}.form.title_size_placeholder"),
                ]) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('description_size', __("admin/{$folder}.form.description_size")) !!}
                {!! Form::number('description_size', $slider->description_size, [
                    'placeholder' => __("admin/{$folder}.form.description_size_placeholder"),
                ]) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('button_url', __("admin/{$folder}.form.button_url")) !!}
                {!! Form::text('button_url', $slider->button_url, [
                    'placeholder' => __("admin/{$folder}.form.button_url_placeholder"),
                ]) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('status_', __('admin/general.status')) !!}
                {!! Form::select('status', statusList(), $slider->status) !!}
            </div>
        </div>
    </div>
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
