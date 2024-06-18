<?php

namespace App\Services;

use App\DTO\Comment\NewCommentDTO;
use App\Models\Comment;
use App\Models\Post;

class CommentService
{
    public function replyToComment(Comment $parentComment, NewCommentDTO $newReplyDTO)
    {
        $newComment = Comment::create([
           'reply_to' => $parentComment->id,
           'post_id' => $parentComment->post->id,
           'author_id' => $newReplyDTO->author->id,
           'text' => $newReplyDTO->text,
        ]);

        return $newComment;
    }

    public function addToPost(Post $post, NewCommentDTO $newReplyDTO)
    {
        $newComment = Comment::create([
            'reply_to' => null,
            'post_id' => $post->id,
            'author_id' => $newReplyDTO->author->id,
            'text' => $newReplyDTO->text,
        ]);

        return $newComment;
    }
}
