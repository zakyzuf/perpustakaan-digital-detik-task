<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request)
    {
        // try {
            $data = new User;
            $data->name = $request->input('name');
            $data->email = $request->input('email');
            $data->role = $request->input('role', 'user');
            $data->password = $request->input('password');
            $data['password'] = Hash::make($request->password);
            $data->save();

            Alert::success('Success', 'Register berhasil');
            return redirect()->route('auth.index');
        // } catch (\Throwable $e) {
        //     Alert::error('Error', 'Register gagal');
        //     return redirect()->back();
        // }
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::toast('Selamat datang ' . auth()->user()->name, 'success');
            return redirect()->route('home');
        }

        Alert::toast('Email atau password salah', 'error');
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::toast('Anda berhasil logout', 'success');
        return redirect()->route('auth.login');
    }
}
