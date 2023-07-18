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

    public function send(Request $request)
    {
        $message = Message::find($request->id);
        $message->status = StatusEnum::Answered->value;
        return $message->save();
    }
}
