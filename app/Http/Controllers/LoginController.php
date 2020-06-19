<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{

    public function showForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required', 'max:100'],
            'avatar' => ['nullable', 'image', 'max:1024']
        ]);

        if ($request->hasFile('avatar')) {
            $path = $request->avatar->store('avatars', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'avatar' => $path ?? null
        ]);

        Cookie::queue(Cookie::make('user_id', $user->id, 60 * 24 * 30));
        return redirect('/');
    }
}
