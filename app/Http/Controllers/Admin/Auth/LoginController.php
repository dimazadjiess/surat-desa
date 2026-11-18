<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // return inertia
        return inertia('Admin/Auth/Login');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request): RedirectResponse
    {
        // set validation
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        // get email and password from request
        $credentials = $request->only('email', 'password');

        // attempt to login
        if (Auth::attempt($credentials)) {

            // regenerate session
            $request->session()->regenerate();

            // redirect route dashboard
            return redirect()->route('admin.dashboard');
        }

        // if login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * logout
     *
     * @return void
     */
    public function logout(Request $request): RedirectResponse
    {
        // logout user
        Auth::logout();

        // invalidate session
        $request->session()->invalidate();

        // regenerate token
        $request->session()->regenerateToken();

        // force redirect ke halaman login admin
        return redirect()->to('/admin/login');
    }
}
