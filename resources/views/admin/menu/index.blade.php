@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.title"));
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    {{ __("admin/{$folder}.create") }}
                </div>
                <div class="card-body">
                    @include('admin.layout.langTabs')
                    {!! Form::open(['route' => "admin.{$route}.store", 'method' => 'post']) !!}
                    <div class="tab-content">
                        @foreach (languageList() as $key => $lang)
                            <div id="{{ $lang->code }}"
                                class="tab-pane fade @if ($loop->first) active show @endif">
                                <div class="form-group">
                                    {!! Form::label('title', __("admin/{$folder}.form.title")) !!} <span class="manitory">*</span>
                                    {!! Form::text("title[$lang->code]", null, ['placeholder' => __("admin/{$folder}.form.title_placeholder")]) !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', __("admin/{$folder}.form.url")) !!}
                        {!! Form::text('url', null, ['placeholder' => __("admin/{$folder}.form.url_placeholder")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('order', __("admin/{$folder}.form.order")) !!}
                        {!! Form::number('order', 0, ['placeholder' => __("admin/{$folder}.form.order_placeholder")]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('parent', __("admin/{$folder}.form.parent")) !!}
                        {!! Form::select('parent_id', $parentList) !!}
                    </div>
                    <div class="form-group">
                        <label class="inputcheck">
                            {!! Form::label('blank', __("admin/{$folder}.form.blank")) !!}
                            {!! Form::checkbox('blank', true, false) !!}
                            <span class="checkmark"></span>
                        </label>
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
                    {{ __("admin/{$folder}.content") }}
                </div>
                <div class="card-body">
                    <div class="menu">
                        <ul>
                            @foreach ($menus as $menu)
                                @if ($menu->parent_id == 0)
                                    <li class="parent">{{ $menu->getTitle() }}
                                        <span class="badge bg-lightgreen">{{ $menu->url ? '->' . $menu->url : '' }}</span>
                                    </li>
                                    @if ($menu->getSubMenu())
                                        @include("admin.{$folder}.subMenus")
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
