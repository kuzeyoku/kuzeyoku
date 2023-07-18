<?php

namespace App\Services\Admin;

use App\Enums\StatusEnum;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MessageService extends BaseService
{
    public function __construct(Message $message)
    {
        parent::__construct($message);
    }

    public function statusUpdate(Model $message)
    {
        $data = new Request([
            "status" => StatusEnum::Read->value
        ]);

        parent::update($data, $message);
    }

    public function send(Model $message)
    {
        $data = new Request([
            "status" => StatusEnum::Answered->value
        ]);
        try {
            parent::update($data, $message);
        } catch (\Throwable $th) {
            dd($th->getMessage);
        }
    }
}
