<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    public $users = [];

    public function __construct()
    {
        $this->users = User::pluck('id')->toArray();
    }

    public function randomUser()
    {
        $randomKey = array_rand($this->users);

        return $this->users[$randomKey];
    }

    public function run()
    {
        $lv1_cmt_ids = [];
        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'user_id' => $this->randomUser(),
                'article_id' => 1,
                'cmt_reply_id' => null,
                'comment_content' => 'Bình luận level 1.' . $i,
                'comment_created_at' => now(),
                'comment_updated_at' => now(),
            ];
            $new_cmt = Comment::create($data);
            $lv1_cmt_ids[] = $new_cmt->comment_id;
        }

        $lv2_cmt_ids = [];
        foreach ($lv1_cmt_ids as $index => $id) {
            $n = rand(0, 6);
            for ($i = 1; $i <= $n; $i++) {
                $data = [
                    'user_id' => $this->randomUser(),
                    'article_id' => 1,
                    'cmt_reply_id' => $id,
                    'comment_content' => 'Bình luận level 2 , trả lời của comment ' . $id,
                    'comment_created_at' => now(),
                    'comment_updated_at' => now(),
                ];
                $new_cmt = Comment::create($data);
                $lv2_cmt_ids[] = $new_cmt->comment_id;
            }
        }

        $lv3_cmt_ids = [];
        foreach ($lv2_cmt_ids as $index => $id) {
            $n = rand(0, 6);
            for ($i = 1; $i <= $n; $i++) {
                $data = [
                    'user_id' => $this->randomUser(),
                    'article_id' => 1,
                    'cmt_reply_id' => $id,
                    'comment_content' => 'Bình luận level 3 , trả lời của comment ' . $id,
                    'comment_created_at' => now(),
                    'comment_updated_at' => now(),
                ];
                $new_cmt = Comment::create($data);
                $lv3_cmt_ids[] = $new_cmt->comment_id;
            }
        }

        $lv4_cmt_ids = [];
        foreach ($lv3_cmt_ids as $index => $id) {
            $n = rand(0, 6);
            for ($i = 1; $i <= $n; $i++) {
                $data = [
                    'user_id' => $this->randomUser(),
                    'article_id' => 1,
                    'cmt_reply_id' => $id,
                    'comment_content' => 'Bình luận level 4 , trả lời của comment ' . $id,
                    'comment_created_at' => now(),
                    'comment_updated_at' => now(),
                ];
                $new_cmt = Comment::create($data);
                $lv4_cmt_ids[] = $new_cmt->comment_id;
            }
        }
    }
}

// $lv1_cmts = Comment::where('article_id', 1)->whereNull('cmt_reply_id')->get();
