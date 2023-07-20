<?php

namespace App\Enums;

enum ModuleEnum: string
{
    case Message = "message";
    case Page = 'page';
    case Language = 'language';
    case Blog = "blog";
    case Category = "category";
    case Service = "service";
    case Brand = "brand";
    case Reference = "reference";
    case Product = "product";
    case Slider = "slider";
    case Testimonial = "testimonial";
    case Popup = "popup";

    public function title(): string
    {
        return __("admin/$this->value.title");
    }

    public function icon(): string
    {
        return match ($this) {
            self::Message => "ri-mail-send-line",
            self::Page => 'ri-pages-fill',
            self::Language => 'ri-translate',
            self::Blog => "ri-newspaper-fill",
            self::Category => "ri-list-check",
            self::Service => "ri-service-fill",
            self::Brand => "ri-shopping-bag-fill",
            self::Reference => "ri-refresh-fill",
            self::Product => "ri-shopping-cart-fill",
            self::Slider => "ri-slideshow-3-fill",
            self::Testimonial => "ri-chat-3-fill",
            self::Popup => "ri-window-fill",
        };
    }

    public function route(): string
    {
        return match ($this) {
            self::Message => "message",
            self::Page => 'page',
            self::Language => 'language',
            self::Blog => "blog",
            self::Category => "category",
            self::Service => "service",
            self::Brand => "brand",
            self::Reference => "reference",
            self::Product => "product",
            self::Slider => "slider",
            self::Testimonial => "testimonial",
            self::Popup => "popup",
        };
    }

    public function controller(): string
    {
        return match ($this) {
            self::Message => \App\Http\Controllers\Admin\MessageController::class,
            self::Page => \App\Http\Controllers\Admin\PageController::class,
            self::Language => \App\Http\Controllers\Admin\LanguageController::class,
            self::Blog => \App\Http\Controllers\Admin\BlogController::class,
            self::Category => \App\Http\Controllers\Admin\CategoryController::class,
            self::Service => \App\Http\Controllers\Admin\ServiceController::class,
            self::Brand => \App\Http\Controllers\Admin\BrandController::class,
            self::Reference => \App\Http\Controllers\Admin\ReferenceController::class,
            self::Product => \App\Http\Controllers\Admin\ProductController::class,
            self::Slider => \App\Http\Controllers\Admin\SliderController::class,
            self::Testimonial => \App\Http\Controllers\Admin\TestimonialController::class,
            self::Popup => \App\Http\Controllers\Admin\PopupController::class,
        };
    }

    public function menu(): array
    {
        return match ($this) {

            self::Message => [
                "index" => __("admin/$this->value.index"),
            ],
            self::Page => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list")
            ],
            self::Language => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list")
            ],
            self::Blog => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list")
            ],
            self::Category => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list")
            ],
            self::Service => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list")
            ],
            self::Brand => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list")
            ],
            self::Reference => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list")
            ],
            self::Product => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list")
            ],
            self::Slider => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list")
            ],
            self::Testimonial => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list"),
            ],
            self::Popup => [
                "index" => __("admin/$this->value.index"),
                "create" => __("admin/$this->value.create"),
                "list" => __("admin/$this->value.list"),
            ],
        };
    }

    public static function toSelectArray(): array
    {
        return [
            self::Blog->value => self::Blog->title(),
            self::Service->value => self::Service->title(),
            self::Product->value => self::Product->title(),
        ];
    }

    public function folder(): string
    {
        return match ($this) {
            self::Message => "message",
            self::Page => 'page',
            self::Language => "language",
            self::Blog => "blog",
            self::Category => "category",
            self::Service => "service",
            self::Brand => "brand",
            self::Reference => "reference",
            self::Product => "product",
            self::Slider => "slider",
            self::Testimonial => "testimonial",
            self::Popup => "popup",
        };
    }

    public function image(): array
    {
        return match ($this) {
            self::Blog => ["width" => 800, "height" => 600],
            self::Service => ["width" => 400, "height" => 250],
            self::Brand => ["width" => 400, "height" => 250],
            self::Reference => ["width" => 400, "height" => 250],
            self::Product => ["width" => 800, "height" => 600],
            self::Slider => ["width" => 1920, "height" => 1080],
            self::Testimonial => ["width" => 100, "height" => 100],
            self::Popup => ["width" => 800, "height" => 600],
        };
    }
}
