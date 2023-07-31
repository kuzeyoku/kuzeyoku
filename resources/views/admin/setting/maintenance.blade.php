<div class="form-group">
    {!! Form::label('status', __('admin/setting.maintenance.status')) !!}
    {!! Form::select('status', App\Enums\StatusEnum::getOnOffSelectArray(), config('setting.maintenance.status')) !!}
</div>
<div class="form-group">
    {!! Form::label('message', __('admin/setting.maintenance.message')) !!}
    {!! Form::textarea('message', config('setting.maintenance.message'), [
        'placeholder' => __('admin/setting.maintenance.message_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('end_date', __('admin/setting.maintenance.end_date')) !!}
    {!! Form::date('end_date', config('setting.maintenance.end_date')) !!}
</div>
