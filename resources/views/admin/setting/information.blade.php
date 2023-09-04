<div class="form-group">
    {!! Form::label('cookie_notification_status', __('admin/setting.information.cookie_notification_status')) !!}
    {!! Form::select(
        'cookie_notification_status',
        App\Enums\StatusEnum::getOnOffSelectArray(),
        config('setting.information.cookie_notification_status'),
    ) !!}
</div>
<div class="form-group">
    {!! Form::label('cookie_page', __('admin/setting.information.cookie_page')) !!}
    {!! Form::select('cookie_page', $pagelist, config('setting.information.cookie_page'), [
        'placeholder' => __('admin/general.select'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('privacy_page', __('admin/setting.information.privacy_page')) !!}
    {!! Form::select('privacy_page', $pagelist, config('setting.information.privacy_page'), [
        'placeholder' => __('admin/general.select'),
    ]) !!}
</div>
