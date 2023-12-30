@foreach ($commentsWithReplies as $comment)
    <p class="btn-primary" data-toggle="collapse" href="#collapseExample{{$comment->comment_id}}" role="button" aria-expanded="false" aria-controls="collapseExample"
        style="margin-left: {{ $level * 60 }}px;">
        <strong>ID: </strong>{{ $comment->comment_id }},
        <strong>Content: </strong>{{ $comment->comment_content }}
    </p>
    @if ($comment->replies && $comment->replies->isNotEmpty())
    <div class="collapse" id="collapseExample{{$comment->comment_id}}">
        <div class="card card-body">
                @include('user.pages.comment', [
                    'commentsWithReplies' => $comment->replies,
                    'level' => $level + 1,
                ])
        </div>
    </div>
    @endif
@endforeach
