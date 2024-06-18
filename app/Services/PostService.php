<?php

namespace App\Services;

use App\DTO\Post\CreatePostDTO;
use App\Models\Post;

class PostService
{
    public function create(CreatePostDTO $createPostDTO)
    {
        $newPost = Post::create([
           'title' => $createPostDTO->title,
           'text' => $createPostDTO->text,
           'author_id' => $createPostDTO->author->id,
        ]);

        return $newPost;
    }

    public function delete(int $postId)
    {
        return Post::destroy($postId);
    }
}
