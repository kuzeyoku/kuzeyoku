<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('logo_header', __('admin/setting.logo.header'), ['class' => 'd-block']) !!}
            {!! Form::file('logo_header', [
                'class' => 'dropify',
                'data-default-file' => config('setting.general.logo'),
                'accept' => '.png, .jpg, .jpeg, .gif',
            ]) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('logo_footer', __('admin/setting.logo.footer'), ['class' => 'd-block']) !!}
            {!! Form::file('logo_footer', [
                'class' => 'dropify',
                'data-default-file' => config('setting.general.logo'),
                'accept' => '.png, .jpg, .jpeg, .gif',
            ]) !!}
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            {!! Form::label('favicon', __('admin/setting.logo.favicon'), ['class' => 'd-block']) !!}
            {!! Form::file('favicon', [
                'class' => 'dropify',
                'data-default-file' => config('setting.general.logo'),
                'accept' => '.png, .ico',
            ]) !!}
        </div>
    </div>
</div>
