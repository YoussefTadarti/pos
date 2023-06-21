<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show view login
    public function show()
    {
        return view('admin.auth.login');
    }
    public function store(LoginRequest $request)
    {

        // The validation in Request folder
        if (Auth::guard('admin')->attempt(["username" => $request->input('username'), "password" => $request->input('password')])) {
            return redirect()->route("admin.index");
        } else {
            echo 'You are not admin here';
        }
    }
}
