<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * View form login
     *
     * @return 
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.pages.auth.login');
    }

    /**
     * Login OHION
     *
     * @param Request $request
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successfully !!!');
        }

        return redirect()->route('admin.login')->with('error', 'Login failed !!!');
    }

    /**
     * Logout
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login')->with('success', 'Logout successfully !!!');
    }
}
