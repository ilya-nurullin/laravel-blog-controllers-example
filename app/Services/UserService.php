<?php

namespace App\Services;

use App\Models\User;
use App\VO\DatetimeIntervalVO;
use App\VO\UserIdVO;
use App\VO\UserPasswordVO;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function changePassword(User $user, UserPasswordVO $newRawPassword)
    {
        $user->password = Hash::make($newRawPassword->getValue());
        $user->save();
    }

    public function findUserById(UserIdVO $userIdVO)
    {
        // $repo->findUser($userIdVO->getValue())
    }

    public function findUserWithinCreatedAt(DatetimeIntervalVO $intervalVO)
    {

    }
}
