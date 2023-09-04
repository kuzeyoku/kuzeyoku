{!! Form::open(['route' => "admin.{$route}.store", 'method' => 'post']) !!}
<div class="tab-content">
    @foreach (languageList() as $key => $lang)
        <div id="{{ $lang->code }}" class="tab-pane fade @if ($loop->first) active show @endif">
            <div class="form-group">
                {!! Form::label('title', __("admin/{$folder}.form.title")) !!} <span class="manitory">*</span>
                {!! Form::text("title[$lang->code]", null, ['placeholder' => __("admin/{$folder}.form.title_placeholder")]) !!}
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    {!! Form::label('urlSelect', __("admin/{$folder}.form.urlSelect")) !!}
    {!! Form::select('urlSelect', $urlList, null, ['placeholder' => __('admin/general.select')]) !!}
    <span>{{ __("admin/{$folder}.form.urlSelectNote") }}</span>
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
    {!! Form::select('parent_id', $parentList, 0, ['placeholder' => __('admin/general.select')]) !!}
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
