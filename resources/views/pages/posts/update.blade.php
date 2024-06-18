@extends('layouts.main')

@section('main')
    <h1>Update post</h1>
    <form action="">
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select name="author_id" class="form-select" id="author">
                <option value="1">Author</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea id="text" name="text" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
