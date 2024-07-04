<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts\ConfirmDeleteController;
use App\Http\Middleware\CheckQ;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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

Route::get('/int', function (){
    dump(app('error'));
    return "ok";
});

Route::post('/upload', function (Request $request) {
    $extension = $request->file('avatar')->getExtension();
    dump($request->file('avatar'));
    dump($request->file('avatar')->getFilename());
    dd($extension);
    dump($request->file('avatar')->storeAs('avatar/img.'.$extension));
    return 'ok';
});

Route::get('/f', function (){
    return '
<form action="/upload" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="'.csrf_token().'">
<input type="file" name="avatar">
<button>Send</button>
</form>
    ';
});
