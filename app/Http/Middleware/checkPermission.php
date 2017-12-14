<?php

namespace App\Http\Middleware;

use Closure;

class checkPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
      if($request->user()->has_permission($level))
        return $next($request);
      else
        abort(403, 'Access denied');
    }
}
