@extends('layouts.root')

@section('head-bottom')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-4">
                @include('blocks.sidebar')
            </div>
            <div class="col-8">
                @yield('main')
            </div>
        </div>
    </div>
@endsection

@section('body-bottom')
    @vite('resources/js/app.ts')
    @vite('resources/css/app.css')
@endsection
