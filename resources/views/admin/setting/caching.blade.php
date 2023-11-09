<div class="form-group">
    {{ Form::label(__('admin/setting.caching.status')) }}
    {{ Form::select(
        'status',
        [
            1 => __('admin/general.on'),
            0 => __('admin/general.off'),
        ],
        config('setting.caching.status'),
    ) }}
</div>
<div class="form-group">
    {{ Form::label(__('admin/setting.caching.time')) }}
    {{ formInfo(__('admin/setting.caching.time_info')) }}
    {{ Form::text('time', config('setting.caching.time'), [
        'placeholder' => __('admin/setting.caching.time_placeholder'),
    ]) }}
</div>
