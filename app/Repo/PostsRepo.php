<?php

namespace App\Repo;

use App\Models\Post;

class PostsRepo
{
    public function getAllPosts()
    {
        return Post::all();
    }
}
