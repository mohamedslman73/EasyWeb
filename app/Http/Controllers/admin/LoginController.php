<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lead;
use Illuminate\Support\Facades\Auth;
use AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('lead')->check()) {
            return redirect()->to(loadAsset('/lead'));
        }
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $attempt = Auth::guard('lead')->attempt($credentials, $request->remember);
        if ($attempt) {
            if (session()->has('redirectUriAdminLogin'))
                return redirect()->to(loadAsset(session()->get("redirectUriAdminLogin")));

            return redirect()->intended(loadAsset('lead'));
        }

        return redirect()->to(loadAsset('lead/login'))->with(['error' => 'wrong email or password']);
    }

    public function logout()
    {
        Auth::guard('lead')->logout();
        return redirect()->to(loadAsset('lead/login'));
    }

}

