<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $attributes = [
        'active' => true,
        'admin' => false,
    ];


    protected $fillable = [
        'name','email', 'avatar',
        'active','password', 'admin',
    ];

   protected $hidden = [
        'password',
        'remember_token',
    ];

   protected  $casts = [
       'password' => 'hashed'
   ];
}
