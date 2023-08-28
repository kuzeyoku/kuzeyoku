{!! Form::open(['url' => route("admin.{$route}.update", $menu), 'method' => 'put']) !!}
<div class="tab-content">
    @foreach (languageList() as $key => $lang)
        <div id="{{ $lang->code }}" class="tab-pane fade @if ($loop->first) active show @endif">
            <div class="form-group">
                {!! Form::label('title', __("admin/{$folder}.form.title")) !!} <span class="manitory">*</span>
                {!! Form::text("title[$lang->code]", $menu->title[$lang->code] ?? null, [
                    'placeholder' => __("admin/{$folder}.form.title_placeholder"),
                ]) !!}
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    {!! Form::label('url', __("admin/{$folder}.form.url")) !!}
    {!! Form::text('url', $menu->url, ['placeholder' => __("admin/{$folder}.form.url_placeholder")]) !!}
</div>
<div class="form-group">
    {!! Form::label('order', __("admin/{$folder}.form.order")) !!}
    {!! Form::number('order', $menu->order ?? 0, ['placeholder' => __("admin/{$folder}.form.order_placeholder")]) !!}
</div>
<div class="form-group">
    {!! Form::label('parent', __("admin/{$folder}.form.parent")) !!}
    {!! Form::select('parent_id', $parentList, $menu->parent_id) !!}
</div>
<div class="form-group">
    <label class="inputcheck">
        {!! Form::label('blank', __("admin/{$folder}.form.blank")) !!}
        {!! Form::checkbox('blank', true, $menu->blank) !!}
        <span class="checkmark"></span>
    </label>
</div>
{!! Form::hidden('type', $type) !!}
{!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}