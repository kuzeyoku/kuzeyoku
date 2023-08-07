<?php

namespace App\Enums;

enum UserRole: string
{
    case DEMO  = "demo";
    case EDITOR = "editor";
    case ADMIN = "admin";

    public function permissions()
    {
        return match ($this) {
            self::DEMO => [
                "admin.dashboard.index",
                "admin.page.index",
                "admin.page.create",
                "admin.page.edit",
                "admin.service.index",
                "admin.service.create",
                "admin.service.edit",
                "admin.setting.index",
                "admin.product.index",
                "admin.product.create",
                "admin.product.edit",
                "admin.project.index",
                "admin.project.create",
                "admin.project.edit",
                "admin.popup.index",
                "admin.popup.create",
                "admin.popup.edit",
                "admin.reference.index",
                "admin.reference.create",
                "admin.reference.edit",
            ],
            self::EDITOR => [
                "page.view",
                "page.create",
                "page.update",

            ],
            self::ADMIN => [
                "page.view",
                "page.create",
                "page.update",
                "page.delete",
            ]
        };
    }

    public function title(): string
    {
        return __("admin/role." . $this->value);
    }

    public static function getValues(): array
    {
        return [
            self::DEMO->value,
            self::EDITOR->value,
            self::ADMIN->value,
        ];
    }

    public function in(string $role): bool
    {
        return $this->value === $role;
    }
}
