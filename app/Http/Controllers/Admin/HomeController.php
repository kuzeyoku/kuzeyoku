<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        Log::get('test');
        $messages = Message::unread()->count();
        return view('admin.index', compact('messages'));
    }

    public function cacheClear()
    {
        Cache::flush();
        return redirect()->back()->with('success', __('admin/general.cache_clear_success'));
    }
}
