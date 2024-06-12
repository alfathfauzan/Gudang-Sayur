<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    function home() {
        $userId = Auth::id();
        return view('home', ['userId' => $userId]);
    }

    function admin() {
        return view('admin');
    }

}
