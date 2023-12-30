@extends('user.layouts.content-wrapper')
@section('title', 'Product')
@section('sub-title', 'Product')
@section('user.pages.content')
<div class="container">
    <h1><i class="fa-solid fa-boxes-packing"></i> Comment and Reply Comment đa cấp sử dụng ĐỆ QUY</h1>
    @foreach ($commentsWithReplies as $comment)
        <p class="btn-primary" data-toggle="collapse" href="#collapseExample{{$comment->comment_id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
            <strong>ID: </strong>{{ $comment->comment_id }},
            <strong>Content: </strong>{{ $comment->comment_content }}
        </p>
        @if ($comment->replies && $comment->replies->isNotEmpty())
            <div class="collapse" id="collapseExample{{$comment->comment_id}}">
                <div class="card card-body">
                    @include('user.pages.comment', ['commentsWithReplies' => $comment->replies, 'level' => 1])
                </div>
            </div>
        @endif
    @endforeach
</div>
@endsection

@push('styles-page')

@endpush

@push('scripts-page')

@endpush
