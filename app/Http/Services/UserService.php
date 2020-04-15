<?php


namespace App\Http\Services;

use App\Models\User;
use Hash;

class UserService
{
    public function authBasic(string $email, string $password){
        $user = User::where('email', $email)->where('master',1)->first();
        if ($user) {
            if (Hash::check($password,$user->pw)) {
                return $user;
            }
        }
        return null;
    }
}
