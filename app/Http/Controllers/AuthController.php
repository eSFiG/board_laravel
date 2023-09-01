<?php


namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function form() {
        return view('auth');
    }

    public function auth(LoginRequest $request) {
        if (Auth::attempt($request->validated())) {
            $user = User::where('login', $request->login)->first();
            Auth::login($user);
            return redirect('/');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
