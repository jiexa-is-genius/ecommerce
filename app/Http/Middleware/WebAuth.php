<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WebAuth
{
    
    public function handle(Request $request, Closure $next)
    {
        
        $ref = null;
        if(request()->path() <> '/') {
            $ref = '/' . request()->path();
            $ref = '/' . base64_encode($ref);
        }
        
        if(!\App\Models\User::auth()) {
            return redirect()->to('/user/login' . $ref);
        }

        return $next($request);
    }
}
