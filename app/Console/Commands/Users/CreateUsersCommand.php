<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUsersCommand extends Command
{

    protected $signature = 'users:create';


    protected $description = 'Command description';


    public function handle()
    {
        $user = new User();

        $user->name = $this->ask('Имя', 'Test');
        $user->email = $this->ask('Email', 'Test@foo.bar');
        $user->password = $this->ask('Пароль', 'Secret123!');

        $user->save();

        $this->info('Пользователь создан');
    }
}
