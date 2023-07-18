<div class="form-group">
    {!! Form::label(__('admin/setting.general.title')) !!}
    {!! Form::text('title', config('setting.title'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.general.title_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.general.description')) !!}
    {!! Form::textarea('description', config("setting.description"), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.general.description_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.general.keywords')) !!}
    {!! Form::textarea('keywords', config("setting.keywords"), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.general.keywords_placeholder'),
    ]) !!}
</div>
