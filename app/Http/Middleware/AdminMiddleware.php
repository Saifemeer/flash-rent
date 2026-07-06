<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
   {
    // Logic: Agar banda login hai AUR uski is_admin wali value 1 (true) hai, toh aage jaane do
    if (auth()->check() && auth()->user()->is_admin) {
        return $next($request);
    }

    // Agar admin nahi hai, toh dhakka de kar dashboard par phenko aur error dikhao
    return redirect()->route('dashboard')->with('error', 'Aap ke paas is page ko kholne ki ijazaat nahi hai! ❌');
}
}
