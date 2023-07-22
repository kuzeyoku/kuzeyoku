<div class="row mb-3">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label(__('admin/setting.image.folder')) !!}
            {!! Form::text('upload_folder', null, [
                'placeholder' => __('admin/setting.image.folder_placeholder'),
            ]) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label(__('admin/setting.image.max_size')) !!}
            {!! Form::number('max_size', null, [
                'placeholder' => __('admin/setting.image.max_size_placeholder'),
            ]) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label(__('admin/setting.image.image_quality')) !!}
            {!! Form::number('image_quality', null, [
                'placeholder' => __('admin/setting.image.image_quality_placeholder'),
            ]) !!}
        </div>
    </div>

</div>
