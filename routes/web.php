<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
//    return "<h1>Hello world</h1>";

    return ['ok' => true, 'data' => ['message' => 'hello world']];
});

Route::view('/html', 'html');
Route::view('/php', 'php',
    ['show' => false,
        'name' => request()->input('name')
    ]);

Route::view('/blade', 'blade',
    [
        'show' => true,
        'name' => request()->input('name'),
        'users' => ['John', 'Kate', 'Mike']
//        'users' => []
    ]);

Route::view('/home', 'pages.home');

Route::get('/about', function (Request $request) {
    return view('pages.about');
});

Route::get('/qb', function (Request $request) {
    $id = $request->get('id');

    if ($id == "2") {
        throw new UnauthorizedHttpException("asd");
    }

    $dbRes = DB::table('users')
        ->orderByDesc('id')
        ->where('id', $id)
        ->whereBetween('id', [$id-1, $id+1])
        ->pluck('name');


    // 1
    $adminsQuery = fn () => DB::table('users')->where('role', 'admin')
        ->where('group', 'owner');


    // 2
    $activeAdminsQuery = $adminsQuery()->where('status', 'active');
    $bannedAdminsQuery = $adminsQuery()->where('status', 'banned');


    $adminsQuery()->dumpRawSql();

    dump($dbRes);

    return "";
});
