<?php

namespace App\VO;

use Illuminate\Support\Str;

class UserPasswordVO
{
    public function __construct(protected string $password)
    {
        if (Str::length($password) < 12)
            throw new \Exception('Weak password');

    }

    public function getValue()
    {
        return $this->password;
    }
}
