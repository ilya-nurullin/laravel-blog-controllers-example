<div class="d-flex flex-column border-bottom">
    <div>
        <span>{{ $comment->author->name }}</span>
        <span>{{ $comment->created_at }}</span>
    </div>
    <div>
        {{ $comment->text }}
    </div>
    <div>
        <a href="{{ route('comments.show', ['post' => $comment->post->id, 'comment' => $comment->id])  }}">Reply or Thread</a>
    </div>
</div>
