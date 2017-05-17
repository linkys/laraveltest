<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;

class ExistsUsersFile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!\File::exists( storage_path('app').'/users.txt' )) {
            \Storage::disk('local')->put('users.txt', 'admin###'.md5('123123'));
        }

        return $next($request);

    }
}
