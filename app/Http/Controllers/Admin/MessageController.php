<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Message\ReplyMessageRequest;
use App\Models\Message;
use App\Services\Admin\MessageService;

class MessageController extends Controller
{

    protected $service;
    protected $route;
    protected $folder;

    public function __construct(MessageService $messageService)
    {
        $this->service = $messageService;
        $this->route = "message";
        $this->folder = "message";
        view()->share("route", $this->route);
        view()->share("folder", $this->folder);
    }

    public function index()
    {
        $items = $this->service->all();
        return view("admin.{$this->folder}.index", compact("items"));
    }

    public function show(Message $message)
    {
        $this->service->statusUpdate($message);
        return view("admin.{$this->folder}.show", compact("message"));
    }

    public function reply(Message $message)
    {
        return view("admin.{$this->folder}.reply", compact("message"));
    }

    public function sendReply(ReplyMessageRequest $request)
    {
        if ($this->service->sendReply($request)) {
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.send_success"));
        } else {
            return back()
                ->withError(__("admin/{$this->folder}.send_error"));
        }
    }

    public function destroy(Message $message)
    {
        if ($this->service->delete($message))
            return redirect()
                ->route("admin.{$this->route}.index")
                ->withSuccess(__("admin/{$this->folder}.delete_success"));
        return back()
            ->withError(__("admin/{$this->folder}.delete_error"));
    }
}
