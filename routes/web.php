<?php

use App\Livewire\Counter;
use Facades\App\Calc\CalcImpl;
use App\Calc\ICalc;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts\ConfirmDeleteController;
use App\Http\Middleware\CheckQ;
use App\Http\Middleware\CheckReq;
use App\Http\Middleware\EnhanceReq;
use App\Jobs\SendMail;
use App\Models\User;
use Illuminate\Cache\CacheManager;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Monolog\Handler\RotatingFileHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;



Route::get('/', function () {
    return Cache::remember('main-page:'.Auth::id(), 20,
        fn () => view('welcome')->render()
    );
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/w', fn(Request $request) => ['status' => 'ok', 'api_token' => $request->get('token')]);
//    ->middleware([EnhanceReq::class, 'check_req:gsdfg!!!']);

Route::middleware('check_role:admin')->prefix('admin')->group(function () {
    Route::get('/show',  fn () => 'admins only');
});


Route::get('/set', function () {
    $res = Cache::remember('age', 15, function () {
        return 123;
    });

    dump($res);

    return 'ok';
});

Route::get('/get', function () {
    $res = cache()->remember();

    dump($res);

    return 'ok';
});

Route::get('/rc', function () {
   $lock = Cache::lock('index', 7, 'main');

   dump($lock);

   if ($lock->get()) {

       sleep(3);

       dump($lock->release());

       return "done";
   }

   return "locked";
});

Route::get('/block', function () {
    try {
        $res = Cache::lock('qwe', 10)->block(3, function () {
            sleep(4);
            return true;
        });

        dump($res);
        return "ok";
    } catch (\Throwable $e) {
        dump($e);
        return "not ok";
    }
});

Route::get('/lr', function () {
   $lock = Cache::lock('index', 7, 'main');

   dump($lock->release());

   return "released";
});


Route::get('/get-t', function () {
    dump(Cache::get('name'));
});

Route::get('/set-t', function () {
    dump(Cache::tags(['people', 'name'])->set('name', 'Qwewer'));
    dump(Cache::tags(['people', 'age'])->set('age', '123'));

    return "ok";
});

Route::get('/user', function () {
    $user = User::remember(13)->find(1);
    dump($user->name);
    dump($user);
    return $user;
});

Route::get('/dis', function () {
//    $job = new SendMail('admin@admin', 'Notification from queue', 'random');

//    dispatch($job)->afterResponse();

    SendMail::dispatch('345admin@admin', 'Notification from queue', 'random');
    SendMail::dispatch('345admin@admin', 'Notification from queue', 'random');
    SendMail::dispatch('345admin@admin', 'Notification from queue', 'random');

//    dispatch(function () {
//        Log::info('dispatch with closure');
//    });

    return 'ok';
});

Route::get('/facade', function (ICalc $calc) {
    $ca = CalcImpl::sum(1, 5);
    $ca->sum(0,2);
    $val = $ca->res(); // 6

    return ['first' => [$val]];
});

