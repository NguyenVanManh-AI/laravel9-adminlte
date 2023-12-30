<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Throwable;

class CommentController extends Controller
{
    public function responseOK($status = 200, $data = null, $message = '')
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status' => $status,
        ], $status);
    }

    public function responseError($status = 400, $message = '')
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], $status);
    }

    public function addComment(Request $request)
    {
        try {
            $cmt = Comment::create($request->all());

            return $this->responseOK(200, $cmt, 'Bình luận thành công !');
        } catch (Throwable $e) {
            return $this->responseError(400, $e->getMessage());
        }
    }

    public function updateComment(Request $request)
    {
        try {
            $cmt = Comment::find($request->comment_id);
            $cmt->update($request->all());

            return $this->responseOK(200, $cmt, 'Cập nhật bình luận thành công !');
        } catch (Throwable $e) {
            return $this->responseError(400, $e->getMessage());
        }
    }

    protected function getReplies(Collection $comments, $articleId)
    {
        foreach ($comments as $comment) {
            // Lấy tất cả các reply cho comment hiện tại
            $replyComments = Comment::where('article_id', $articleId)->where('cmt_reply_id', $comment->comment_id)->get();
            // Nếu có reply, gọi đệ quy để lấy reply của reply (câu trả lời của câu trả lời)
            if ($replyComments->isNotEmpty()) {
                $comment->replies = $this->getReplies($replyComments, $articleId);
            }
        }

        return $comments;
    }

    public function commentOfArticle(Request $request, $id)
    {
        try {
            // Lấy tất cả các comment không có parent (cmt_reply_id = null)
            $comments = Comment::where('article_id', $id)->whereNull('cmt_reply_id')->get();
            // Gọi hàm đệ quy để lấy câu trả lời cho từng comment
            $commentsWithReplies = $this->getReplies($comments, $id);

            return $this->responseOK(200, $commentsWithReplies, 'Xem tất cả bình luận của bài viết thành công !');
        } catch (Throwable $e) {
            return $this->responseError(400, $e->getMessage());
        }
    }

    public function showCommentOfArticle(Request $request, $id)
    {
        try {
            // Lấy tất cả các comment không có parent (cmt_reply_id = null)
            $comments = Comment::where('article_id', $id)->whereNull('cmt_reply_id')->get();
            // Gọi hàm đệ quy để lấy câu trả lời cho từng comment
            $commentsWithReplies = $this->getReplies($comments, $id);

            return view('user.pages.container_comment', compact('commentsWithReplies'));
        } catch (Throwable $e) {
            return $this->responseError(400, $e->getMessage());
        }
    }
}
