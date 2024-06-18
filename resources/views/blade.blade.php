<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>Document</title>
    <style>
        .odd { color: red; }
        .even { color: blue; }
    </style>
</head>
<body>
@php($header = 'Main')

<h1>{{ $header }}</h1>

<ol>
@forelse($users as $user)
    <li @class(['qwe', 'odd' => $loop->odd, 'even' => $loop->even])>{{ $user }}</li>
@empty
    <p>No users</p>
@endforelse
</ol>
</body>
</html>
