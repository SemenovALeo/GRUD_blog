<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store( Request $request)
    {
        $data = $request->all();
        alertText(__('Добро пожаловать!'));

        return to_route('user');
    }
}
