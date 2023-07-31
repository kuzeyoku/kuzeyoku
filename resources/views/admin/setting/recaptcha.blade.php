<div class="form-group">
    {!! Form::label('status', __('admin/setting.recaptcha.status')) !!}
    {!! Form::select('status', App\Enums\StatusEnum::getOnOffSelectArray(), config('setting.recaptcha.status')) !!}
</div>
<div class="form-group">
    {!! Form::label('site_key', __('admin/setting.recaptcha.site_key')) !!}
    {!! Form::text('site_key', config('setting.recaptcha.site_key'), [
        'placeholder' => __('admin/setting.recaptcha.site_key_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('secret_key', __('admin/setting.recaptcha.secret_key')) !!}
    {!! Form::text('secret_key', config('setting.recaptcha.secret_key'), [
        'placeholder' => __('admin/setting.recaptcha.secret_key_placeholder'),
    ]) !!}
</div>
