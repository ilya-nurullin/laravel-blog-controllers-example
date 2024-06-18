<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>@yield('title', config('app.name'))</title>

    @section('meta')
        <meta type="keywords" content="{{ config('app.name') }}">
        <meta type="description" content="{{ config('app.name') }}">
    @show

    @yield('head-bottom')
</head>
<body>
@yield('body')
@yield('body-bottom')
</body>
</html>
