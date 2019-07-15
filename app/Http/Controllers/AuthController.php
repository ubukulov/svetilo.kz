<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends BaseController
{
    public function showLogin()
    {
        return view('themes.besmart.login');
    }

    public function showRegister()
    {
        return view('themes.besmart.register');
    }

    public function registration(Request $request)
    {
        $data = $request->except('password', 'confirm_password');
        $data['password'] = bcrypt($request->input('password'));
        if (!User::exists($data['email'])) {
            $user = User::create($data);
            \Auth::login($user);
            return redirect()->route('home');
        } else {
            return back()->with('message', 'Такой пользователь ранее зарегистрирован.');
        }
    }

    public function authenticate(Request $request)
    {
        if (\Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('home');
        } else {
            return back()->with('message', 'Логин или пароль не правильно.');
        }
    }
}
