<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $title = 'Dashboard | UnReceipts';

        return view('dashboard', [
            'title' => $title
        ]);
    }
}
