<div class="form-group">
    {!! Form::label(__("admin/setting.dashboard.pagination")) !!}
    {{ formInfo(__("admin/setting.dashboard.pagination_info")) }}
    {!! Form::number("pagination", config("setting.pagination"), ["placeholder"=>__("admin/setting.dashboard.pagination_placeholder")]) !!}
</div>
