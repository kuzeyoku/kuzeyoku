<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Contact\SendContactRequest;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|min:3|max:50",
            "phone" => "required|numeric|digits_between:10,15",
            "email" => "required|email:filter",
            "subject" => "required|string|min:3|max:50",
            "message" => "required|string|min:3|max:500",
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withError(__("Eksik Yada Hatalı Bilgi Girdiniz."));
        }

        $data = array_merge($validator->validate(), ["user_agent" => $request->userAgent(), "ip" => $request->ip()]);
        if (Message::Create($data)) {
            return back()
                ->withSuccess(__("contact.send_success"));
        }
        return back()
            ->withInput()
            ->withError(__("contact.send_error"));
    }
}
