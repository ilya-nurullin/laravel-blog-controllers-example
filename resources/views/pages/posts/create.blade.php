@extends('layouts.main')

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="post">
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
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea id="text" name="text" class="form-control @error('text') is-invalid @enderror"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
