<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class DisableInstallerWhenInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Storage::fileExists('installer/installed.lock')) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
