<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\VisitorLog;

class LogVisitor
{
    public function handle($request, Closure $next)
    {
        // Simpan log kunjungan
        VisitorLog::create([
            'page' => $request->path(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return $next($request);
    }
}

