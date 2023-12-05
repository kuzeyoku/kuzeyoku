<div class="form-group">
    {!! Form::label(__('admin/setting.smtp_host')) !!}
    {!! Form::text('host', config('setting.smtp_host'), [
        'placeholder' => __("admin/{$folder}.smtp_host_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp_port')) !!}
    {!! Form::number('port', config('setting.smtp_port'), [
        'placeholder' => __("admin/{$folder}.smtp_port_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp_username')) !!}
    {!! Form::text('username', config('setting.smtp_username'), [
        'placeholder' => __("admin/{$folder}.smtp_username_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp_password')) !!}
    {!! Form::text('password', config('setting.smtp_password'), [
        'placeholder' => __("admin/{$folder}.smtp_password_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp_encryption')) !!}
    {!! Form::text('encryption', config('setting.smtp_encryption'), [
        'placeholder' => __("admin/{$folder}.smtp_encryption_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp_from_address')) !!}
    {!! Form::text('from_address', config('setting.smtp_from_address'), [
        'placeholder' => __("admin/{$folder}.smtp_from_address_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp_from_name')) !!}
    {!! Form::text('from_name', config('setting.smtp_from_name'), [
        'placeholder' => __("admin/{$folder}.smtp_from_name_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp_reply_address')) !!}
    {!! Form::text('reply_address', config('setting.smtp_reply_address'), [
        'placeholder' => __("admin/{$folder}.smtp_reply_address_placeholder"),
    ]) !!}
</div>
