<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {
        $messages = Message::unread()->count();
        return view('admin.index', compact('messages'));
    }

    public function cacheClear()
    {
        Cache::flush();
        return redirect()->back()->with('success', __('admin/general.cache_clear_success'));
    }
}
