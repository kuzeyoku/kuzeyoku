<?php

namespace App\Enums;

enum ModuleEnum: string
{
    case Message = "message";
    case Menu = "menu";
    case Page = 'page';
    case Language = 'language';
    case Blog = "blog";
    case Category = "category";
    case Service = "service";
    case Brand = "brand";
    case Reference = "reference";
    case Product = "product";
    case Project = "project";
    case Slider = "slider";
    case Testimonial = "testimonial";
    case Popup = "popup";
    case User = "user";

    public function title(): string
    {
        return __("admin/$this->value.title");
    }

    public function icon(): string
    {
        return match ($this) {
            self::User => "ri-user-3-fill",
            self::Message => "ri-mail-send-line",
            self::Menu => "ri-menu-fill",
            self::Page => 'ri-pages-fill',
            self::Language => 'ri-translate',
            self::Blog => "ri-newspaper-fill",
            self::Category => "ri-list-check",
            self::Service => "ri-service-fill",
            self::Brand => "ri-shopping-bag-fill",
            self::Reference => "ri-refresh-fill",
            self::Product => "ri-shopping-cart-fill",
            self::Project => "ri-pencil-ruler-2-fill",
            self::Slider => "ri-slideshow-3-fill",
            self::Testimonial => "ri-chat-3-fill",
            self::Popup => "ri-window-fill",
        };
    }

    public function route(): string
    {
        return match ($this) {
            self::User => "user",
            self::Message => "message",
            self::Menu => "menu",
            self::Page => 'page',
            self::Language => 'language',
            self::Blog => "blog",
            self::Category => "category",
            self::Service => "service",
            self::Brand => "brand",
            self::Reference => "reference",
            self::Product => "product",
            self::Project => "project",
            self::Slider => "slider",
            self::Testimonial => "testimonial",
            self::Popup => "popup",
        };
    }

    public function folder(): string
    {
        return match ($this) {
            self::User => "user",
            self::Message => "message",
            self::Menu => "menu",
            self::Page => 'page',
            self::Language => "language",
            self::Blog => "blog",
            self::Category => "category",
            self::Service => "service",
            self::Brand => "brand",
            self::Reference => "reference",
            self::Product => "product",
            self::Project => "project",
            self::Slider => "slider",
            self::Testimonial => "testimonial",
            self::Popup => "popup",
        };
    }

    public function controller(): string
    {
        return match ($this) {
            self::User => \App\Http\Controllers\Admin\UserController::class,
            self::Message => \App\Http\Controllers\Admin\MessageController::class,
            self::Menu => \App\Http\Controllers\Admin\MenuController::class,
            self::Page => \App\Http\Controllers\Admin\PageController::class,
            self::Language => \App\Http\Controllers\Admin\LanguageController::class,
            self::Blog => \App\Http\Controllers\Admin\BlogController::class,
            self::Category => \App\Http\Controllers\Admin\CategoryController::class,
            self::Service => \App\Http\Controllers\Admin\ServiceController::class,
            self::Brand => \App\Http\Controllers\Admin\BrandController::class,
            self::Reference => \App\Http\Controllers\Admin\ReferenceController::class,
            self::Product => \App\Http\Controllers\Admin\ProductController::class,
            self::Project => \App\Http\Controllers\Admin\ProjectController::class,
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
            self::User => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Menu => [
                "header" => __("admin/$this->value.header_title"),
                "footer" => __("admin/$this->value.footer_title"),
            ],
            self::Page => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Language => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Blog => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Category => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Service => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Brand => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Reference => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Product => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Project => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Slider => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Testimonial => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
            self::Popup => [
                "create" => __("admin/$this->value.create"),
                "index" => __("admin/$this->value.list"),
            ],
        };
    }

    public static function toSelectArray(): array
    {
        return [
            self::Blog->value => self::Blog->title(),
            self::Service->value => self::Service->title(),
            self::Product->value => self::Product->title(),
            self::Project->value => self::Project->title(),
        ];
    }

    public function image(): array
    {
        return match ($this) {
            self::Blog => ["width" => 800, "height" => 600],
            self::Service => ["width" => 500, "height" => 500],
            self::Brand => ["width" => 150, "height" => 50],
            self::Reference => ["width" => 400, "height" => 250],
            self::Product => ["width" => 800, "height" => 600],
            self::Project => ["width" => 800, "height" => 600],
            self::Slider => ["width" => 1920, "height" => 1080],
            self::Testimonial => ["width" => 300, "height" => 300],
            self::Popup => ["width" => 800, "height" => 600],
        };
    }
}
