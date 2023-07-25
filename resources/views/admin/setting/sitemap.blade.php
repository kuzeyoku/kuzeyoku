<div class="form-group">
    {!! Form::label(__("admin/{$folder}.sitemap.static_pages")) !!}
    <div class="row">
        <div class="col-lg-10">
            {!! Form::range('static_page[priority]', config('static_page'), [
                'class' => 'form-control',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select('static_page[changefreq]', [1, 2, 3, 4, 5], 1, ['class' => 'sitemap-changefreq']) !!}
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    {!! Form::label(__("admin/{$folder}.sitemap.blog")) !!}
    <div class="row">
        <div class="col-lg-10">
            {!! Form::range('blog[priority]', config('blog'), [
                'class' => 'form-control',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select('blog[changefreq]', [1, 2, 3, 4, 5], 1, ['class' => 'sitemap-changefreq']) !!}
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    {!! Form::label(__("admin/{$folder}.sitemap.blog_category")) !!}
    <div class="row">
        <div class="col-lg-10">
            {!! Form::range('blog_category[priority]', config('blog_category'), [
                'class' => 'form-control',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select('blog_category[changefreq]', [1, 2, 3, 4, 5], 1, ['class' => 'sitemap-changefreq']) !!}
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    {!! Form::label(__("admin/{$folder}.sitemap.blog_post")) !!}
    <div class="row">
        <div class="col-lg-10">
            {!! Form::range('blog_post[priority]', config('blog_post'), [
                'class' => 'form-control',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select('blog_post[changefreq]', [1, 2, 3, 4, 5], 1, ['class' => 'sitemap-changefreq']) !!}
        </div>
    </div>
</div>
