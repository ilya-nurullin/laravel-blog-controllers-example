<?php

namespace App\DTO\Comment;

use App\Models\User;

class NewCommentDTO
{

    public function __construct(public User $author,
                                public string $text)
    {
    }
}
