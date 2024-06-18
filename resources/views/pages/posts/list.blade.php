@extends('layouts.main')

@section('main')
    @if(session()->has('new_post_id'))
        <div class="alert alert-success">
            New post created with id = {{ session('new_post_id') }}
        </div>
    @endif
    @if(session()->has('removed_post_id'))
        <div class="alert alert-info">
            Removed post with id = {{ session('removed_post_id') }}
        </div>
    @endif
    @foreach($posts as $post)
        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="h3 text-primary d-block">{{ $post->title }}</a>
    @endforeach
@endsection
