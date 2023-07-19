<?php

namespace App\Services\Admin;

use App\Models\Message;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use App\Mail\Admin\ReplyMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

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

    public function sendReply(Request $request)
    {
        try {
            $message = Message::findOrFail($request->message_id);
            Mail::send(new ReplyMessage($request, $message->name));
            $message->status = StatusEnum::Answered->value;
            $message->save();
            return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()
                ->withError($e->getMessage());
        }
    }
}
