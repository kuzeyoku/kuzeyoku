<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.host')) !!}
    {!! Form::text('host', config('setting.smtp.host')) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.port')) !!}
    {!! Form::number('port', config('setting.smtp.port')) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.username')) !!}
    {!! Form::text('username', config('setting.smtp.username')) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.password')) !!}
    {!! Form::text('password', config('setting.smtp.password')) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.encryption')) !!}
    {!! Form::text('encryption', config('setting.smtp.encryption')) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.from_address')) !!}
    {!! Form::text('from_address', config('setting.smtp.from_address')) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.from_name')) !!}
    {!! Form::text('from_name', config('setting.smtp.from_name')) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.reply_address')) !!}
    {!! Form::text('reply_address', config('setting.smtp.reply_address')) !!}
</div>
