<div class="form-group">
    {!! Form::label('maintenance', __('admin/setting.maintenance.status')) !!}
    {!! Form::select('maintenance', App\Enums\StatusEnum::getOnOffSelectArray(), config('setting.maintenance')) !!}
</div>
<div class="form-group">
    {!! Form::label('maintenance_message', __('admin/setting.maintenance.message')) !!}
    {!! Form::textarea('maintenance_message', config('setting.maintenance_message'), [
        'placeholder' => __('admin/setting.maintenance.message_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('maintenance_end_date', __('admin/setting.maintenance.end_date')) !!}
    {!! Form::date('maintenance_end_date', config('setting.maintenance.end_date')) !!}
</div>
