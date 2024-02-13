<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class CheckAdminAccess
{
    public function handle($request, Closure $next)
    {
        if (Gate::allows('access-admin')) {
            return redirect('/dashboard/admin/houses');
        }

        return redirect('/dashboard/dema/houses');
    }
}
