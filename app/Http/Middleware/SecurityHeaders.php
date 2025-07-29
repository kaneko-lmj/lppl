<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
 
        $response->headers->set('Content-Security-Policy', "default-src 'self' https://radio.suaralumajang.com:8443 http://127.0.0.1:5173; script-src 'self' 'unsafe-inline' http://127.0.0.1:5173; style-src 'self' 'unsafe-inline' http://127.0.0.1:5173; font-src 'self' http://127.0.0.1:5173 data:; connect-src 'self' http://127.0.0.1:5173 ws://127.0.0.1:5173; media-src 'self' https://radio.suaralumajang.com:8443; frame-src 'self' https://maps.google.com https://www.google.com;");

        // Header keamanan standar
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->remove('X-Powered-By');
        $response->headers->set('Referrer-Policy', 'no-referrer');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=()');
        
        // dd($response->headers->all());  
        
        return $response;
    }
}
