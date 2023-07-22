<div class="form-group">
    {!! Form::label('cache_notification', __('admin/setting.information.cache_notification')) !!}
    {!! Form::select(
        'cache_notification',
        App\Enums\StatusEnum::getOnOffSelectArray(),
        config('setting.cache_notification'),
    ) !!}
</div>
<div class="form-group">
    {!! Form::label('cache', __('admin/setting.information.cache')) !!}
    {!! Form::select('cache', $pagelist, config('setting.cache')) !!}
</div>
<div class="form-group">
    {!! Form::label('privacy', __('admin/setting.information.privacy')) !!}
    {!! Form::select('privacy', $pagelist, config('setting.privacy')) !!}
</div>
