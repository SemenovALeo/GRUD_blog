<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store( StorePostRequest $request)
    {

        $data = $request->only([
            'name',
            'email',
            'password'
        ]);

        User::query()->create($data);

       return to_route('user');


    }
}
