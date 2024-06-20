<?php

namespace App\Repo\User;

use App\Models\User;

class EloquentUserRepo implements UserRepo
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
