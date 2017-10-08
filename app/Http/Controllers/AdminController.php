<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }


    public function postlogin(Request $request)
    {
        $this->validate($request ,[
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password ], $request->remember )){
            return redirect()->route('admindashboard');
        }
        return redirect()->back()->withInput($request->only('username', 'remember'))->with('msg','User Email Or Password Did Not Matched');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
