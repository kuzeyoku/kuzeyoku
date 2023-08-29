<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Contact\SendContactRequest;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact.index');
    }

    public function send(SendContactRequest $request)
    {
        $data = array_merge($request->validated(), ["user_agent" => $request->userAgent(), "ip" => $request->ip()]);
        if (Message::Create($data)) {
            Cache::flush();
            return redirect()
                ->route("contact.index")
                ->withSuccess(__("contact.send_success"));
        }
        return back()
            ->withInput()
            ->withError(__("contact.send_error"));
    }
}
