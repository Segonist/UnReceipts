<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        $title = 'Register | UnReceipts';

        return view('register/create', [
            'title' => $title
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' =>    ['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:8', 'confirmed'],
        ]);
        $user = User::create($attributes);

        auth()->login($user);

        return redirect('dashboard');
    }
}
