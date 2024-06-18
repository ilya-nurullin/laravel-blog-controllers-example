@extends('layouts.main')

@section('main')
    <div class="row justify-content-md-center">
        <div class="col-6">
            <h1>Comment</h1>
            <a href="{{ route('posts.show', ['post' => $comment->post->id]) }}">Back to post</a>
            <p>{{ $comment->author->name }}</p>
            <p>{{ $comment->text }}</p>
            <div>
                <h4>Add reply</h4>
                <form method="post" action="{{ route('comments.reply', ['post' => $comment->post->id, 'comment' => $comment->id]) }}">
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
                        <textarea id="text" name="text" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
            <h4 class="my-4">Comments</h4>
            <div class="comments">
                @foreach($comment->replies as $reply)
                    <x-comment :comment="$reply"></x-comment>
                @endforeach
            </div>
        </div>
    </div>
@endsection
