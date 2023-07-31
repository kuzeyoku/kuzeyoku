@foreach ($service->getSitemapModuleList() as $module)
    <div class="form-group">
        {!! Form::label(__("admin/{$folder}.sitemap.{$module}")) !!}
        <div class="row">
            <div class="col-lg-10">
                {!! Form::range($module . '_priority', config('setting.sitemap.' . $module . '_priority'), [
                    'class' => 'form-control',
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1,
                ]) !!}
            </div>
            <div class="col-lg-2">
                {!! Form::select(
                    $module . '_changefreq',
                    $service->getChangeFreqList(),
                    config('setting.sitemap.' . $module . '_changefreq'),
                    ['class' => 'sitemap-changefreq'],
                ) !!}
            </div>
        </div>
    </div>
@endforeach
