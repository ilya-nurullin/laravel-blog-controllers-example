<?php

namespace App\DTO\Post;

use App\Models\User;
use Illuminate\Http\Request;

class CreatePostDTO
{
    public function __construct(public User $author,
                                public string $title,
                                public string $text)
    {
    }
}
