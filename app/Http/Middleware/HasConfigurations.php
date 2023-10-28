<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;


class HasConfigurations
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('login');
        }
        if(!$user->configurations)
        {
            $this->newUserNoConfigurationsError();
            return redirect()->route('configurations.create');

        }
        if ($user->configurations->isEmpty()) {
            $this->newUserNoConfigurationsError();
            return redirect()->route('configurations.create');
        }

        return $next($request);
    }
    public function newUserNoConfigurationsError()
    {
        $errorMessage = "Hey there friend! You're new and need to make a";
        Session::flash('error', $errorMessage); // Attach the error message
    }

}
