<?php

namespace App\VO;

use Illuminate\Support\Str;

class UserIdVO
{
    public function __construct(protected string $id)
    {
        if (Str::length($id) < 5)
            throw new \Exception('Wrong id');

    }

    public function getValue()
    {
        return $this->id;
    }
}
