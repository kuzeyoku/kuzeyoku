<div class="form-group">
    {!! Form::label(__('admin/setting.pagination.admin')) !!}
    {{ formInfo(__('admin/setting.pagination.admin_info')) }}
    {!! Form::number('admin', config('setting.pagination.admin'), [
        'placeholder' => __('admin/setting.pagination.admin_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.pagination.front')) !!}
    {{ formInfo(__('admin/setting.pagination.front_info')) }}
    {!! Form::number('front', config('setting.pagination.front'), [
        'placeholder' => __('admin/setting.pagination.front_placeholder'),
    ]) !!}
</div>
