<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Admin\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $errorLogsFile = storage_path('logs/custom_errors.log');
        $infoLogsFile = storage_path('logs/custom_info.log');
        if (File::exists($errorLogsFile)) {
            $errorLogs = array_filter(explode("\n", File::get($errorLogsFile)), function ($line) {
                return !empty($line);
            });
        } else {
            $errorLogs = [];
        }
        if (File::exists($infoLogsFile)) {
            $infoLogs = array_filter(explode("\n", File::get($infoLogsFile)), function ($line) {
                return !empty($line);
            });
        } else {
            $infoLogs = [];
        }
        $messages = Message::unread()->count();
        return view('admin.index', compact('messages', 'errorLogs', 'infoLogs'));
    }

    public function cacheClear()
    {
        Cache::flush();
        return redirect()->back()->with('success', __('admin/general.cache_clear_success'));
    }
}
