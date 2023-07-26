<?php

namespace App\Services\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Page;

class SettingService
{
    public function route(): string
    {
        return "setting";
    }

    public function folder(): string
    {
        return "setting";
    }

    public function update(Request $request)
    {
        $settings = collect($request->except(["_token", "_method", "category"]))
            ->map(function ($value, $key) use ($request) {
                return [
                    'category' => $request->input('category'),
                    'key' => $key,
                    'value' => $value
                ];
            })->toArray();

        Setting::upsert($settings, ['key', 'category'], ['value']);

        Cache::forget("setting");
    }

    public function pageList(): array
    {
        return array_merge([__("admin/general.select")], Page::toSelectArray());
    }

    public static function getSitemapModuleList()
    {
        return [
            "home",
            "page",
            "blog",
            "blog_category",
            "blog_post",
            "service",
            "service_category",
            "service_detail",
            "product",
            "product_category",
            "product_detail",
            "project",
            "project_category",
            "project_detail",
        ];
    }

    public static function getChangeFreqList(): array
    {
        return [
            "always" => __("admin.setting.sitemap.always"),
            "hourly" => __("admin.setting.sitemap.hourly"),
            "daily" => __("admin.setting.sitemap.daily"),
            "weekly" => __("admin.setting.sitemap.weekly"),
            "monthly" => __("admin.setting.sitemap.monthly"),
            "yearly" => __("admin.setting.sitemap.yearly"),
            "never" => __("admin.setting.sitemap.never"),
        ];
    }
}
