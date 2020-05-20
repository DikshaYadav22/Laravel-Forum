<?php

namespace App\Http\Middleware;

use Closure;
use App\Channel;

class VerifyChannelCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Channel::all()->count()==0)
        {
            return redirect()->route('channels.create');
        }
        return $next($request);
    }
}
