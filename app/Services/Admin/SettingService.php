<?php

namespace App\Services\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingService
{
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
        return \App\Models\Page::toSelectArray();
    }

}
