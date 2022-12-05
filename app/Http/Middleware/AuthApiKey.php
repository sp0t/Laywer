<?php
namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\Auth;

class AuthApiKey
{
    public function handle($request, Closure $next, $guard = null)
    {
        $route_name = Route::currentRouteName();
        if(in_array($route_name, [
            'api.privacy', 'api.terms', 'api.about', 'api.delivery', 'api.size_guide'
        ])){
            return $next($request);
        }

        $key = $request->header('X-Authorization');
        if(!in_array($key,
            ['d742f4dc-425d-45ff-bd9d-10112022100500']
        )){
            return api_error_response(API_KEY_INVALID, 'Invalid Api Key');
        }
        return $next($request);
    }
}