<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Contact\SendContactRequest;

class ContactController extends Controller
{

    protected $route;
    protected $folder;

    public function __construct()
    {
        $this->route = "contact";
        $this->folder = "contact";
    }

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
                ->route("{$this->route}.index")
                ->withSuccess(__("{$this->folder}.send_success"));
        }
        return back()
            ->withInput()
            ->withError(__("{$this->folder}.send_error"));
    }
}
