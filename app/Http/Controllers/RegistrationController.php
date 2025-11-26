<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|min:6|max:50|alpha_num|unique:users,login',
            'password' => 'required|min:8',
            'fio' => 'required|regex:/^[А-Яа-яЁё ]+$/u|max:100',
            'phone' => [
                'required',
                'regex:/^8\(\d{3}\)\d{3}-\d{2}-\d{2}$/'
            ],
            'email' => 'required|email|unique:users,email'
        ]);

        User::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'fio' => $request->fio,
            'phone' => $request->phone,
            'email' => $request->email,
            'is_admin' => 0
        ]);

        return redirect('/login')->with('success', 'Пользователь успешно зарегистрирован!');
    }
}
