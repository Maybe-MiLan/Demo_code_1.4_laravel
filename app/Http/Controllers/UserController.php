<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function reg(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'login' => 'required|string|unique:users|regex:/^[A-z]/i',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'agree' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back();
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_auth' => 'required|string',
            'password_auth' => 'required|string',
        ]);

        if (Auth::attempt([
            'login' => $request->login_auth,
            'password' => $request->password_auth,
        ])) {
            return redirect('/application/my');
        }

        return redirect()->back()->withErrors(['auth' => 'Ошибка входа']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
