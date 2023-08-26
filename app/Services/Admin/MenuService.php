<?php

namespace App\Services\Admin;

use App\Models\Menu;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;

class MenuService extends BaseService
{
    protected $menu;

    public function __construct(Menu $menu)
    {
        parent::__construct($menu, ModuleEnum::Menu);
    }

    public function create(Object $request)
    {
        $data = new Request([
            "url" => $request->url,
            "type" => $request->type,
            "parent_id" => $request->parent_id,
            "order" => $request->order,
        ]);

        $query = parent::create($data);

        if ($query->id) {
            //$this->translations($query->id, $request);
        }
    }
}
