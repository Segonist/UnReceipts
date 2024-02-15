<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        $title = 'Log in | UnReceipts';

        return view('login/create', [
            'title' => $title
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['login' => 'Wrong username or password']);
        }

        session()->regenerate();
        return redirect('dashboard')->with('Welcome back.');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
