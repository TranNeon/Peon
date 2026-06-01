<?php

namespace App\Http\Middleware;

use App\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

//is not user
class geReviewerPrivilege
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        if (auth()->user()->role === UserRole::USER) {
            return response('', Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
