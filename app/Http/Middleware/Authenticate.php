<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check()){
            return redirect()->to('/login')
                ->with('status', 'success')
                ->with('message', 'Please login.');
        }
        if($role == 'all')
        {
            return $next($request);
        }
        if( auth()->guest() || !$this->hasRole($role))
        {
            abort(503);
        }
        return $next($request);

    }

    public function hasRole($role)
    {
        return  Role::select('name')->where('roles.name', $role)->join('role_user', function ($join) {
            $join->on('roles.id', '=', 'role_user.role_id')
                ->where('role_user.user_id', Auth::id());
        })->exists();
    }
}
