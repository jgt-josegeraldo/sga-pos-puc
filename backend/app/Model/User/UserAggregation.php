<?php

namespace App\Model\User;

use App\Model\User\ModelEloquent\User;
use Illuminate\Support\Facades\Crypt;

class UserAggregation
{
    public function __construct()
    {
    }

    public function create($userData)
    {
        $user = new User($userData);
        $user->pass = Crypt::encrypt((string)$userData['password']);
        $user->save();
        return $user;
    }

    public function login($login, $pass)
    {
        $user = User::where('login', $login)->first();
        
        if ($user && $user->pass && Crypt::decrypt($user->pass) == $pass) {
            return $user;
        }
        return false;
    }
}
