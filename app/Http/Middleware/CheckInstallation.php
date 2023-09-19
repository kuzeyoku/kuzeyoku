<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CheckInstallation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Schema::hasTable('setups')) {
            if (\App\Models\Setup::status() != 'installed') {
                return redirect()->route('setup.index')->with("info", "Kurulum henüz tamamlanmadı.");
            }
        }
        return $next($request);
    }
}
