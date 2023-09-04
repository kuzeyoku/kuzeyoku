<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.host')) !!}
    {!! Form::text('host', config('setting.smtp.host'), [
        'placeholder' => __("admin/{$folder}.smtp.host_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.port')) !!}
    {!! Form::number('port', config('setting.smtp.port'), [
        'placeholder' => __("admin/{$folder}.smtp.port_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.username')) !!}
    {!! Form::text('username', config('setting.smtp.username'), [
        'placeholder' => __("admin/{$folder}.smtp.username_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.password')) !!}
    {!! Form::text('password', config('setting.smtp.password'), [
        'placeholder' => __("admin/{$folder}.smtp.password_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.encryption')) !!}
    {!! Form::text('encryption', config('setting.smtp.encryption'), [
        'placeholder' => __("admin/{$folder}.smtp.encryption_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.from_address')) !!}
    {!! Form::text('from_address', config('setting.smtp.from_address'), [
        'placeholder' => __("admin/{$folder}.smtp.from_address_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.from_name')) !!}
    {!! Form::text('from_name', config('setting.smtp.from_name'), [
        'placeholder' => __("admin/{$folder}.smtp.from_name_placeholder"),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.reply_address')) !!}
    {!! Form::text('reply_address', config('setting.smtp.reply_address'), [
        'placeholder' => __("admin/{$folder}.smtp.reply_address_placeholder"),
    ]) !!}
</div>
