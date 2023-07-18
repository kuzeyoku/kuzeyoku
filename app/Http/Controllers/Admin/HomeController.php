<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function cacheClear()
    {
        Cache::flush();
        return redirect()->back()->with('success', __('admin/general.cache_clear_success')); 
    }
}
