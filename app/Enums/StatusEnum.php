<?php

namespace App\Enums;

use Exception;
use Illuminate\Support\Facades\Cache;

enum StatusEnum: string
{
    case Active = "active";
    case Passive = "passive";
    case Draft = "draft";
    case Pending = "pending";
    case Read = "read";
    case Unread = "unread";
    case Answered = "answered";

    public function title(): string
    {
        return __("admin/status." . $this->value);
    }

    public function color(): string
    {
        return match ($this) {
            self::Active => "lightgreen",
            self::Passive => "lightred",
            self::Draft => "lightgrey",
            self::Pending => "lightyellow",
            self::Read => "lightgreen",
            self::Unread => "lightyellow",
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::Active => "check",
            self::Passive => "ban",
            self::Draft => "edit",
            self::Pending => "clock",
        };
    }

    public function badge(): string
    {
        return sprintf('<span class="badges bg-%s">%s</span>', $this->color(), $this->title());
    }

    public static function getStatus($value)
    {
        switch ($value) {
            case 'active':
                return StatusEnum::Active;
            case 'passive':
                return StatusEnum::Passive;
            case 'draft':
                return StatusEnum::Draft;
            case 'pending':
                return StatusEnum::Pending;
            case 'read':
                return StatusEnum::Read;
            case 'unread':
                return StatusEnum::Unread;
            case 'answered':
                return StatusEnum::Answered;
            default:
                throw new Exception("Geçersiz Değer");
        }
    }

    public static function toSelectArray()
    {
        return [
            StatusEnum::Active->value => StatusEnum::Active->title(),
            StatusEnum::Passive->value => StatusEnum::Passive->title(),
            StatusEnum::Draft->value => StatusEnum::Draft->title(),
            StatusEnum::Pending->value => StatusEnum::Pending->title(),
        ];
    }

    public static function getOnOffSelectArray()
    {
        return [
            StatusEnum::Active->value => StatusEnum::Active->title(),
            StatusEnum::Passive->value => StatusEnum::Passive->title(),
        ];
    }
}
