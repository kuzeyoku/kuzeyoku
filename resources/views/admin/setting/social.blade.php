<div class="form-group">
    {!! Form::label(__('admin/setting.social_facebook')) !!}
    {!! Form::text('facebook', config('setting.social_facebook'), [
        'placeholder' => __('admin/setting.social_facebook_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.social_twitter')) !!}
    {!! Form::text('twitter', config('setting.social_twitter'), [
        'placeholder' => __('admin/setting.social_twitter_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.social_instagram')) !!}
    {!! Form::text('instagram', config('setting.social_instagram'), [
        'placeholder' => __('admin/setting.social_instagram_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.social_youtube')) !!}
    {!! Form::text('youtube', config('setting.social_youtube'), [
        'placeholder' => __('admin/setting.social_youtube_placeholder'),
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label(__('admin/setting.social_linkedin')) !!}
    {!! Form::text('linkedin', config('setting.social_linkedin'), [
        'placeholder' => __('admin/setting.social_linkedin_placeholder'),
    ]) !!}
</div>
