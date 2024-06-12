<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Keranjang;

class CartCount
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItemsCount = Keranjang::where('user_id', $userId)->count();
            View::share('cartItemsCount', $cartItemsCount);
        } else {
            View::share('cartItemsCount', 0);
        }

        return $next($request);
    }
}
