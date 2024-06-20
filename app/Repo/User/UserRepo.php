<?php

namespace App\Repo\User;

use App\Models\User;

interface UserRepo
{
    public function getAllAuthors();

    public function findAuthor(int $authorId);
}
