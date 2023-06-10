<?php

namespace App\Http\Middleware;

use App\Jobs\LogUserInformation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogUserInformationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = Auth::id();
        $userAgent = $request->userAgent();
        $ip = $request->ip();

        LogUserInformation::dispatch($userId, $userAgent, $ip);

        return $next($request);
    }
}
