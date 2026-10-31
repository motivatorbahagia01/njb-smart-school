<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NjbLoginController extends Controller
{
    public function show()
    {
        if (session('njb_admin')) {
            return redirect()->route('dashboard');
        }

        return view('auth.njb-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $adminEmail = (string) config('njb.admin_email');
        $adminPasswordHash = (string) config('njb.admin_password_hash');

        if ($adminEmail === '' || $adminPasswordHash === '' ||
            ! hash_equals(mb_strtolower($adminEmail), mb_strtolower($credentials['email'])) ||
            ! Hash::check($credentials['password'], $adminPasswordHash)) {
            return back()->withErrors(['email' => 'Email atau kata sandi salah, atau akun admin belum dikonfigurasi.'])->onlyInput('email');
        }

        $request->session()->regenerate();
        $request->session()->put('njb_admin', true);

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget('njb_admin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
