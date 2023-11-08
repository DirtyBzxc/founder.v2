<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Player;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EditPlayerCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     */
    public function handle(Request $request, Closure $next): Response
    {
        if()
        {
            return $next($request);
        }
        else
        {
            return view('player.index');
        }
    }
}
