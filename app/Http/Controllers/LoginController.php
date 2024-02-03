<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\StoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store( StoreRequest $request)
    {
        $data = $request->only(['email','password']);

        $remember = (bool) $request->input('remember');


        if (! Auth::attempt($data,$remember)){
            return back()->withErrors([
                'email' => 'Не верный логин или пароль',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

       return to_route('user');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
