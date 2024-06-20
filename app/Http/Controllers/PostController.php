<?php

namespace App\Http\Controllers;

use App\DTO\Post\CreatePostDTO;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Repo\Post\PostRepo;
use App\Repo\User\UserRepo;
use App\Services\Notification\PostNotificationTopics;
use App\Services\PostService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PostRepo $postsRepo)
    {
        $posts = $postsRepo->getAllPosts();
        return view('pages.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserRepo $userRepo)
    {
        $authors = $userRepo->getAllAuthors();
        return view('pages.posts.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request,
                          UserRepo $userRepo,
                          PostService $postService,
                          PostNotificationTopics $postNotificationTopics,
    )
    {
        $author = $userRepo->findAuthor($request->author_id);
        $newPostDTO = new CreatePostDTO($author, $request->title, $request->text);
        $newPost = $postService->create($newPostDTO);

        $postNotificationTopics->newPostNotification(User::find(1), $newPost);

        return redirect()->route('posts.index')
            ->with('new_post_id', $newPost->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, UserRepo $userRepo)
    {
        $authors = $userRepo->getAllAuthors();
        return view('pages.posts.show', compact('post', 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, PostService $postService)
    {
        $postService->delete($post->id);

        return redirect()->route('posts.index')
            ->with('removed_post_id', $post->id);
    }
}
