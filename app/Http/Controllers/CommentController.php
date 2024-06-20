<?php

namespace App\Http\Controllers;

use App\DTO\Comment\NewCommentDTO;
use App\Http\Requests\NewCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Repo\User\UserRepo;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function show(Post $post, UserRepo $userRepo, Comment $comment)
    {
        $authors = $userRepo->getAllAuthors();
        return view('pages.comments.thread', compact('comment', 'post', 'authors'));
    }

    public function reply(NewCommentRequest $request, UserRepo $userRepo, Post $post, Comment $comment, CommentService $commentService)
    {
        $author = $userRepo->findAuthor($request->author_id);
        $newReplyDTO = new NewCommentDTO($author, $request->text);
        $commentService->replyToComment($comment, $newReplyDTO);

        return redirect()->back();
    }

    public function addToPost(NewCommentRequest $request, UserRepo $userRepo, Post $post, CommentService $commentService)
    {
        $author = $userRepo->findAuthor($request->author_id);
        $newReplyDTO = new NewCommentDTO($author, $request->text);
        $commentService->addToPost($post, $newReplyDTO);

        return redirect()->back();
    }
}
