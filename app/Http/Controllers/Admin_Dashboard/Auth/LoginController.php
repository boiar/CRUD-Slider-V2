<?php

namespace App\Http\Controllers\Admin_Dashboard\Auth;

use App\Helpers\ResponsesHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{



    public function getViewLogin()
    {
        if (Auth::check()){
            return redirect(route('admin.homepage'));
        }
        return view('admin_dashboard.auth.login');
    }

    public function login(Request $request){


        $rules     = [
            "email"           => "required|email",
            'password'        => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $remember_me = $request->has('remember_me') ? true : false;

        if(auth()->attempt([
            'user_email' => $request->get("email"),
            'password' => $request->get("password")
        ],$remember_me)){

            return redirect()->route('admin.homepage');
        }

        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }


    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect(route('login'));
    }

}
