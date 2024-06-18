@extends('layouts.main')

@section('main')
    <div class="row justify-content-md-center">
        <a href="{{ route('posts.confirm_delete', ['post' => $post->id]) }}" class="text-danger">Delete post</a>
        <div class="col-6">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->text }}</p>
            <div>
                <h4>Add comment</h4>
                <form action="{{ route('comments.addToPost', ['post' => $post->id]) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <select name="author_id" class="form-select @error('author_id') is-invalid @enderror" id="author">
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}">(#{{ $author->id }}) {{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Text</label>
                        <textarea id="text" name="text" class="form-control @error('text') is-invalid @enderror"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
            <h4 class="my-4">Comments</h4>
            <div class="comments">
                @forelse($post->comments as $comment)
                    <x-comment :comment="$comment"></x-comment>
                @empty
                    <p>No comments</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
