<div class="form-group">
    {!! Form::label(__('admin/setting.general.title')) !!}
    {!! Form::text('title', config('setting.general.title'), [
        'placeholder' => __('admin/setting.general.title_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.general.description')) !!}
    {!! Form::textarea('description', config('setting.general.description'), [
        'placeholder' => __('admin/setting.general.description_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.general.keywords')) !!}
    {!! Form::text('keywords', config('setting.general.keywords'), [
        'placeholder' => __('admin/setting.general.keywords_placeholder'),
    ]) !!}
</div>
