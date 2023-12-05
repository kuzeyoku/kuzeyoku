<div class="form-group">
    {!! Form::label(__('admin/setting.contact_phone')) !!}
    {!! Form::text('phone', config('setting.contact_phone'), [
        'placeholder' => __('admin/setting.contact_phone_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.contact_email')) !!}
    {!! Form::text('email', config('setting.contact_email'), [
        'placeholder' => __('admin/setting.contact_email_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.contact_address')) !!}
    {!! Form::text('address', config('setting.contact_address'), [
        'placeholder' => __('admin/setting.contact_address_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.contact_map')) !!}
    {!! Form::text('map', config('setting.contact_map'), [
        'placeholder' => __('admin/setting.contact_map_placeholder'),
    ]) !!}
</div>
