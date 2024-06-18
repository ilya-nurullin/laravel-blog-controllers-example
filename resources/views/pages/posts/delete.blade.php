@extends('layouts.main')

@section('main')
    <h1>Delete post</h1>
    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}"
          method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
