<div class="form-group">
    {{ Form::label(__('admin/setting.caching.time')) }}
    {{ formInfo(__('admin/setting.caching.time_info')) }}
    {{ Form::text('time', config('setting.time'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.caching.time_placeholder'),
    ]) }}
</div>
