<div class="form-group">
    {!! Form::label(__('admin/setting.contact.phone')) !!}
    {!! Form::text('phone', config('setting.phone'), [
        'placeholder' => __('admin/setting.contact.phone_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.contact.email')) !!}
    {!! Form::text('email', config('setting.email'), [
        'placeholder' => __('admin/setting.contact.email_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.contact.address')) !!}
    {!! Form::text('address', config('setting.address'), [
        'placeholder' => __('admin/setting.contact.address_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.contact.map')) !!}
    {!! Form::text('map', config('setting.map'), [
        'placeholder' => __('admin/setting.contact.map_placeholder'),
    ]) !!}
</div>
