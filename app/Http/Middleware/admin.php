<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\users;
use Exception;
class admin
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
        $data_user = Users::findOrFail(session('user'));
        if($data_user->type == 'admin'){
            return redirect('/admin');
        }
        abort(404, '');
            // return redirect('/Admin');
        return $next($request);
    }
}