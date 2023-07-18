<div class="form-group">
    {!! Form::label(__('admin/setting.social.facebook')) !!}
    {!! Form::text('facebook', config('setting.facebook'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.social.facebook_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.social.twitter')) !!}
    {!! Form::text('twitter', config('setting.twitter'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.social.twitter_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.social.instagram')) !!}
    {!! Form::text('instagram', config('setting.instagram'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.social.instagram_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.social.youtube')) !!}
    {!! Form::text('youtube', config('setting.youtube'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.social.youtube_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.social.linkedin')) !!}
    {!! Form::text('linkedin', config('setting.linkedin'), [
        'class' => 'form-control',
        'placeholder' => __('admin/setting.social.linkedin_placeholder'),
    ]) !!}
</div>
