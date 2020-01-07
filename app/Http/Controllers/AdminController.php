<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $admin = $request->all();
        $user = User::all();

        if (Hash::check($admin['password'], $user[0]['password']) && $user[0]['email'] === $admin['email']) {
            return redirect('login/dashbord');
        }

        return view('auth/login');
    }

    public function dashbord()
    {
        return view('auth/dashbord');
    }

}
