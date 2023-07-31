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
    {!! Form::select('cookie_page', $service->pageList(), config('setting.information.cookie_page')) !!}
</div>
<div class="form-group">
    {!! Form::label('privacy_page', __('admin/setting.information.privacy_page')) !!}
    {!! Form::select('privacy_page', $service->pageList(), config('setting.information.privacy_page')) !!}
</div>
