<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.host')) !!}
    {!! Form::text('smtp_host', config('setting.smtp_host'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.port')) !!}
    {!! Form::number('smtp_port', config('setting.smtp_port'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.username')) !!}
    {!! Form::text('smtp_username', config('setting.smtp_username'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.password')) !!}
    {!! Form::text('smtp_password', config('setting.smtp_password'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.encryption')) !!}
    {!! Form::text('smtp_encryption', config('setting.smtp_encryption'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.from_address')) !!}
    {!! Form::text('smtp_from_address', config('setting.smtp_from_address'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.from_name')) !!}
    {!! Form::text('smtp_from_name', config('setting.smtp_from_name'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.smtp.reply_address')) !!}
    {!! Form::text('smtp_reply_address', config('setting.smtp_reply_address'), ['class' => 'form-control']) !!}
</div>
