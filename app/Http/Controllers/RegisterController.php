<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store( Request $request)
    {
        $data = $request->all();

        dd($data);

        return 'Запрос на регистрацию';
    }
}
