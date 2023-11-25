<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        if ($request->category == "logo") {
            //TODO : Logo Upload
        } else {
            $settings = collect($request->except(["_token", "_method", "category"]))
                ->map(function ($value, $key) use ($request) {
                    return [
                        'category' => $request->category,
                        'key' => $key,
                        'value' => $value
                    ];
                })->toArray();
            Setting::upsert($settings, ['key', 'category'], ['value']);
        }
        Cache::forget("setting");
    }

    public static function getSitemapModuleList()
    {
        $response = ["home"];
        if (ModuleEnum::Page->status()) array_push($response, "static_pages");
        if (ModuleEnum::Blog->status()) array_push($response, "blog", "blog_category", "blog_post");
        if (ModuleEnum::Service->status()) array_push($response, "service", "service_category", "service_detail");
        if (ModuleEnum::Product->status()) array_push($response, "product", "product_category", "product_detail");
        if (ModuleEnum::Project->status()) array_push($response, "project", "project_category", "project_detail");
        return $response;
    }

    public static function getChangeFreqList(): array
    {
        return [
            "always" => __("admin/setting.sitemap.changefreq.always"),
            "hourly" => __("admin/setting.sitemap.changefreq.hourly"),
            "daily" => __("admin/setting.sitemap.changefreq.daily"),
            "weekly" => __("admin/setting.sitemap.changefreq.weekly"),
            "monthly" => __("admin/setting.sitemap.changefreq.monthly"),
            "yearly" => __("admin/setting.sitemap.changefreq.yearly"),
            "never" => __("admin/setting.sitemap.changefreq.never"),
        ];
    }
}
