<?php

namespace App\Http\Middleware;

use App\Models\Author;
use Closure;
use Illuminate\Http\Request;

class AuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Author::where('user_id') == auth()->user()->id)
            return $next($request);
        else
            return redirect()->back();
    }
}
