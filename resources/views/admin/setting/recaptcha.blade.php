<div class="form-group">
    {!! Form::label('recaptcha_status', __('admin/setting.recaptcha.status')) !!}
    {!! Form::select(
        'recaptcha_status',
        App\Enums\StatusEnum::getOnOffSelectArray(),
        config('setting.recaptcha_status'),
    ) !!}
</div>
<div class="form-group">
    {!! Form::label('recaptcha_site_key', __('admin/setting.recaptcha.site_key')) !!}
    {!! Form::text('recaptcha_site_key', config('setting.recaptcha_site_key'), [
        'placeholder' => __('admin/setting.recaptcha.site_key_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('recaptcha_secret_key', __('admin/setting.recaptcha.secret_key')) !!}
    {!! Form::text('recaptcha_secret_key', config('setting.recaptcha_secret_key'), [
        'placeholder' => __('admin/setting.recaptcha.secret_key_placeholder'),
    ]) !!}
</div>
