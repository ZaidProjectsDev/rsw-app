<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use App\Models\ViewingHistory;

class RecordViewedPage
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $routeName = $request->route()->getName();
            if($request->route('id')!=null) {
                if (in_array($routeName, ['games.show', 'submissions.show', 'parts.show'])) {
                    ViewingHistory::create([
                        'user_id' => $user->id,
                        'viewed_model' => $routeName,
                        'viewed_id' => $request->route('id'),
                    ]);
                }
            }
        }

        return $next($request);
    }
}
