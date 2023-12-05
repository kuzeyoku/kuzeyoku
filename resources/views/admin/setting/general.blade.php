<div class="form-group">
    {!! Form::label(__('admin/setting.general_title')) !!}
    {!! Form::text('title', config('setting.general_title'), [
        'placeholder' => __('admin/setting.general_title_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.general_description')) !!}
    {!! Form::textarea('description', config('setting.general_description'), [
        'placeholder' => __('admin/setting.general_description_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.general_keywords')) !!}
    {!! Form::text('keywords', config('setting.general_keywords'), [
        'placeholder' => __('admin/setting.general_keywords_placeholder'),
    ]) !!}
</div>
