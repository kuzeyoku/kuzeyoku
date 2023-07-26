{{-- <div class="form-group">
    {!! Form::label(__("admin/{$folder}.sitemap.home")) !!}
    <div class="row">
        <div class="col-lg-10">
            {!! Form::range('sitemap_home_priority', config('sitemap_home_priority'), [
                'class' => 'form-control',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select(
                'sitemap_home_changefreq',
                $service->getChangeFreqList(),
                config('setting.sitemap_home_changefreq'),
                ['class' => 'sitemap-changefreq'],
            ) !!}
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    {!! Form::label(__("admin/{$folder}.sitemap.static_pages")) !!}
    <div class="row">
        <div class="col-lg-10">
            {!! Form::range('sitemap_static_page_priority', config('sitemap_static_page_priority'), [
                'class' => 'form-control',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select(
                'sitemap_static_page_changefreq',
                $service->getChangeFreqList(),
                config('setting.sitemap_static_page_changefreq'),
                ['class' => 'sitemap-changefreq'],
            ) !!}
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    {!! Form::label(__("admin/{$folder}.sitemap.blog")) !!}
    <div class="row">
        <div class="col-lg-10">
            {!! Form::range('sitemap_blog_priority', config('sitemap_blog_priority'), [
                'class' => 'form-control',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select(
                'sitemap_blog_changefreq',
                $service->getChangeFreqList(),
                config('setting.sitemap_blog_changefreq'),
                ['class' => 'sitemap-changefreq'],
            ) !!}
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    {!! Form::label(__("admin/{$folder}.sitemap.blog_category")) !!}
    <div class="row">
        <div class="col-lg-10">
            {!! Form::range('sitemap_blog_category_priority', config('sitemap_blog_category_priority'), [
                'class' => 'form-control',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select(
                'sitemap_blog_category_changefreq',
                $service->getChangeFreqList(),
                config('setting.sitemap_blog_category_changefreq'),
                ['class' => 'sitemap-changefreq'],
            ) !!}
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    {!! Form::label(__("admin/{$folder}.sitemap.blog_post")) !!}
    <div class="row">
        <div class="col-lg-10">
            {!! Form::range('sitemap_blog_post_priority', config('setting.sitemap_blog_post_priority'), [
                'class' => 'form-control',
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
            ]) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::select(
                'sitemap_blog_post_changefreq',
                $service->getChangeFreqList(),
                config('setting.sitemap_blog_post_changefreq'),
                ['class' => 'sitemap-changefreq'],
            ) !!}
        </div>
    </div>
</div> --}}

@foreach ($service->getSitemapModuleList() as $module)
    <div class="form-group">
        {!! Form::label(__("admin/{$folder}.sitemap.{$module}")) !!}
        <div class="row">
            <div class="col-lg-10">
                {!! Form::range('sitemap_' . $module . '_priority', config('setting.sitemap_' . $module . '_priority'), [
                    'class' => 'form-control',
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1,
                ]) !!}
            </div>
            <div class="col-lg-2">
                {!! Form::select(
                    'sitemap_' . $module . '_changefreq',
                    $service->getChangeFreqList(),
                    config('setting.sitemap_' . $module . '_changefreq'),
                    ['class' => 'sitemap-changefreq'],
                ) !!}
            </div>
        </div>
    </div>
@endforeach
