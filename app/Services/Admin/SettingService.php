<?php

namespace App\Services\Admin;

use App\Models\Setting;
use App\Enums\ModuleEnum;
// use App\Enums\SettingCategoryEnum;
// use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\Storage;

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
        // if ($request->category == SettingCategoryEnum::Logo->value) {
        //     if ($request->hasFile("header") && $request->file("header")->isValid())
        //         $header = $this->logoUpload($request->file("header"), config("setting.logo.header", "header_logo.png"));
        //     if ($request->hasFile("footer") && $request->file("footer")->isValid())
        //         $footer = $this->logoUpload($request->file("footer"), config("setting.logo.footer", "footer_logo.png"));
        //     if ($request->hasFile("favicon") && $request->file("favicon")->isValid())
        //         $favicon = $this->logoUpload($request->file("favicon"), config("setting.logo.favicon", "favicon.ico"));
        //     $newRequest = new Request([
        //         "header" => $header ?? null,
        //         "footer" => $footer ?? null,
        //         "favicon" => $favicon ?? null,
        //         "category" => SettingCategoryEnum::Logo->value,
        //     ]);
        //     $this->query($newRequest);
        // } else {
        //     $this->query($request);
        // }

        $settings = collect($request->except(["_token", "_method", "category"]))
            ->map(function ($value, $key) use ($request) {
                return [
                    'category' => $request->category,
                    'key' => $key,
                    'value' => $value
                ];
            })->toArray();
        return Setting::upsert($settings, ['key', 'category'], ['value']);
        Cache::forget("setting");
    }

    // private function query(Request $request)
    // {
    //     $settings = collect($request->except(["_token", "_method", "category"]))
    //         ->map(function ($value, $key) use ($request) {
    //             return [
    //                 'category' => $request->category,
    //                 'key' => $key,
    //                 'value' => $value
    //             ];
    //         })->toArray();
    //     return Setting::upsert($settings, ['key', 'category'], ['value']);
    // }

    // private function logoUpload(object $file, string $fileName = null)
    // {
    //     $uploadFolder = config("setting.image.upload_folder", "image");
    //     $path = "public/" . $uploadFolder;
    //     Storage::makeDirectory($path, 755, true);

    //     return Storage::putFileAs($path, $file, $fileName) ? $fileName : null;
    // }

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
