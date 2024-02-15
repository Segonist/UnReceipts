<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        if (auth()->check()) {
            return redirect('/dashboard');
        } else {
            return redirect('/login');
        }
    }
}
