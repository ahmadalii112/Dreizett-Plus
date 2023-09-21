<?php

namespace App\Http\Middleware;

use App\Enums\RoleTypeEnum;
use Closure;
use Illuminate\Http\Request;

class AllowGuestOrAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guest() || auth()->user()->hasRole(RoleTypeEnum::ADMINISTRATION->value)) {
            return $next($request);
        }

        return redirect('/'); // Redirect to the dashboard or any other route as needed.
    }
}
