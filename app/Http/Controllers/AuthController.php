<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function authenticate(Request $request){
        if(Auth::attempt(['username' => $request->useremail, 'password' => $request->password])){
            $request->session()->regenerate();

            $user = User::where('username', $request->useremail)->first();
            $request->session()->put('user', $user);

            return redirect('/');
        }

        if(Auth::attempt(['email' => $request->useremail, 'password' => $request->password])){
            $request->session()->regenerate();

            $user = User::where('email', $request->useremail)->first();
            $request->session()->put('user', $user);

            return redirect('/');
        }

        return back()->with('error', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
