<?php

namespace App\Enums;

enum SettingCategoryEnum: string
{
    case General = "general";
    case Dashboard = "dashboard";
    case Information = "information";
    case Social = "social";
    case Caching = "caching";
    case Contact = "contact";
    case Smtp = "smtp";
    case Maintenance = "maintenance";
    case Image = "image";
    case Sitemap = "sitemap";
    case Recaptcha = "recaptcha";

    public function title(): string
    {
        return __("admin/setting.category." . $this->value);
    }

    public function icon(): string
    {
        return match ($this) {
            self::General => "ri-settings-4-fill",
            self::Dashboard => "ri-dashboard-2-fill",
            self::Information => "ri-information-fill",
            self::Social => "ri-share-fill",
            self::Caching => "ri-server-fill",
            self::Contact => "ri-mail-fill",
            self::Smtp => "ri-mail-settings-fill",
            self::Maintenance => "ri-time-fill",
            self::Image => "ri-image-fill",
            self::Sitemap => "ri-mind-map",
            self::Recaptcha => "ri-shield-star-fill"
        };
    }


    public static function getValues(): array
    {
        return array_map(fn ($value) => $value->value, self::cases());
    }

    public function existsViewFile(): bool
    {
        return view()->exists("admin.setting." . $this->value);
    }
}
