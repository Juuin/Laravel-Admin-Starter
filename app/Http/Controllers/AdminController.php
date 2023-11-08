<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    public function loginForm() {
        return Inertia::render('Auth/Login', [
            'status' => session('status'),
        ]);
    }

    public function login(LoginRequest $request) : RedirectResponse {
        $request->authenticate();
        $request->session()->regenerate();
        Auth::user()->update([
            'login_time' => Carbon::now(),
            'login_ip' => $request->ip()
        ]);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function edit(): Response
    {
        return Inertia::render('Profile/Edit', [
            'status' => session('status'),
            'role' => Auth::user()->getRoleNames()->map(function ($role) {
                return __($role);
            })
        ]);
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back();
    }

    public function adminList()
    {
        return Inertia::render('Admin/List', [
            'status' => session('status'),
            'admins' => Admin::all(['id', 'username', 'created_at', 'login_time', 'login_ip'])->toArray()
        ]);
    }

    public function createAdmin(Request $request): RedirectResponse
    {
        if (!Auth::user()->hasPermissionTo('Create Admin')) {
            return back()->with('error', '权限不足');
        }

        $validated = $request->validate([
            'username' => ['required', 'unique:admins'],
            'password' => ['required']
        ]);

        Admin::create([
            'username' => $validated['username'],
            'password' => $validated['password']
        ]);

        return back();
    }
}
