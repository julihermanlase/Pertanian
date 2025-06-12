<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function verify(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email.exists' => 'Email tidak terdaftar dalam sistem.',
        ]);

        $user = User::where('email', $credentials['email'])
            ->where('status', User::STATUS_ACTIVE)
            ->first();

        if (!$user) {
            return back()->with('error', 'Akun tidak aktif atau tidak ditemukan.');
        }

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->isAdmin() || $user->isPetani()) {
                return redirect()->route('dashboard.index')->with('status', 'Selamat datang kembali!');
            }

            return redirect('/');
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Password yang Anda masukkan salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('status', 'Anda berhasil logout.');
    }
}
