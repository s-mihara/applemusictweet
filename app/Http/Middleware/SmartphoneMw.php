<?php

namespace App\Http\Middleware;

use Closure;
use App\Common\amtUtils;
use App\Common\requestScopeUtils;

class SmartphoneMw
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (isset($_SERVER['HTTP_USER_AGENT']) && amtUtils::isSmartPhone($_SERVER['HTTP_USER_AGENT']) || $request->has(requestScopeUtils::SMART_PHONE_KEY)) {
            requestScopeUtils::set(requestScopeUtils::SMART_PHONE_KEY, 't');
        } else {
            requestScopeUtils::set(requestScopeUtils::SMART_PHONE_KEY, 'f');
        }
        return $next($request);
    }
}
