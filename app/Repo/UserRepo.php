<?php

namespace App\Repo;

use App\Models\User;

class UserRepo
{
    public function getAllAuthors()
    {
        return User::all();
    }

    public function findAuthor(int $authorId)
    {
        return User::find($authorId);
    }
}
