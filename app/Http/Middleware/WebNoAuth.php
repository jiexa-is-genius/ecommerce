<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WebNoAuth
{
    
    public function handle(Request $request, Closure $next)
    {
        
        if(\App\Models\User::auth()) {
            return redirect()->to('/');
        }
        
        return $next($request);
    }
}
