<?php

namespace App\Repo\Post;

use App\Models\Post;

class EloquentPostRepo implements PostRepo
{
    public function getAllPosts()
    {
        return Post::all();
    }
}
