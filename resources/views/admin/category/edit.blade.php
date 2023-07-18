@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.edit"))
@section('content')
    @include('admin.layout.langTabs')
    {!! Form::open(['url' => route("admin.{$route}.update", $category), 'method' => 'put']) !!}
    <div class="tab-content">
        @foreach (LanguageList() as $key => $lang)
            <div id="{{ $lang->code }}" class="tab-pane fade @if ($loop->first) active show @endif">
                <div class="form-group">
                    {!! Form::label('title', __("admin/{$folder}.form.title")) !!} <span class="manitory">*</span>
                    {!! Form::text("title[$lang->code]", $category->title[$lang->code] ?? null, [
                        'placeholder' => __("admin/{$folder}.form.title_placeholder"),
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', __("admin/{$folder}.form.description")) !!}
                    {!! Form::textarea("description[$lang->code]", $category->description[$lang->code] ?? null, [
                        'class' => 'editor',
                    ]) !!}
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        {!! Form::label('module', __("admin/{$folder}.form.module")) !!} <span class="manitory">*</span>
        {!! Form::select('module', $modules, $category->module) !!}
    </div>
    <div class="form-group">
        {!! Form::label('parent', __("admin/{$folder}.form.parent")) !!}
        {!! Form::select('parent', $categories, $category->parent_id) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
        {!! Form::select('status', statusList(), $category->status) !!}
    </div>
    {!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
