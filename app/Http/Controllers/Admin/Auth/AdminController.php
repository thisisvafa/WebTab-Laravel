<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(){
        if (Auth::guard('admin')->check()) {
            return redirect()->route('adminDashboard');
        }
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboardAdmin');
        }
        if ($request->isMethod('post')) {
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];
            $messages = [
                'email.required' => 'Email Address is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $messages);
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboardAdmin');
            } else {
                return redirect()->back()->with('error', 'Invalid Email or Password');
            }
        }
        return view('admin.auth.login')->withTitle('Login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('adminLogin');
    }
}
