<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    private $username = "roshandon";
    private $password = "admin123";

    public function showForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'string|max:50',
            'password' => 'string|max:100'
        ]);

        if ($request->username == $this->username && $request->password == $this->password) {
            Cookie::queue(Cookie::make('is_admin', true, 60 * 24 * 30));
            return redirect('/admin');
        }

        return redirect()->back()->with('message', 'Username or password is incorrect');
    }

    public function logout()
    {
        Cookie::queue(Cookie::forget('is_admin'));
        return redirect('/');
    }
}
