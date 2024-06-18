<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts\ConfirmDeleteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
Route::get('/posts/{post}/delete', ConfirmDeleteController::class)->name('posts.confirm_delete');

Route::view('/comments/show', 'pages.comments.thread');

Route::group(['prefix' => '/posts/{post}/comments'], function () {
    Route::get('/{comment}', [CommentController::class, 'show'])->name('comments.show');
    Route::post('/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
    Route::post('/add', [CommentController::class, 'addToPost'])->name('comments.addToPost');
});
