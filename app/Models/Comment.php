<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'comment_id'; // Quan trọng
    // => để cho Eloquent sẽ biết rằng comment_id là khóa chính của bảng chứ không phải là id như thường lệ

    protected $fillable = [
        'comment_id',
        'user_id',
        'article_id',
        'cmt_reply_id',
        'comment_content',
        'comment_created_at',
        'comment_updated_at',
    ];

    protected static function boot()
    {
        parent::boot();

        // Quan trọng
        // để cho cột comment_updated_at được cập nhật lại thời gian mới khi bảng ghi được cập nhật
        // ngoài updating còn nhiều trạng thái khác của một model nữa
        static::updating(function ($model) {
            $model->comment_updated_at = $model->freshTimestamp();
        });
    }
}

/*
    Creating: Sự kiện này được kích hoạt trước khi một bản ghi mới được tạo.
    static::creating(function ($model) {
        // Logic trước khi tạo mới
    });

    Created: Sự kiện này được kích hoạt sau khi một bản ghi mới đã được tạo.
    static::created(function ($model) {
        // Logic sau khi tạo mới
    });

    Updating: Sự kiện này được kích hoạt trước khi một bản ghi được cập nhật.
    static::updating(function ($model) {
        // Logic trước khi cập nhật
    });

    Updated: Sự kiện này được kích hoạt sau khi một bản ghi đã được cập nhật.
    static::updated(function ($model) {
        // Logic sau khi cập nhật
    });

    Saving: Sự kiện này được kích hoạt trước khi một bản ghi được lưu (bao gồm cả tạo mới và cập nhật).
    static::saving(function ($model) {
        // Logic trước khi lưu
    });

    Saved: Sự kiện này được kích hoạt sau khi một bản ghi đã được lưu.
    static::saved(function ($model) {
        // Logic sau khi lưu
    });

    Deleting: Sự kiện này được kích hoạt trước khi một bản ghi bị xóa.
    static::deleting(function ($model) {
        // Logic trước khi xóa
    });

    Deleted: Sự kiện này được kích hoạt sau khi một bản ghi đã bị xóa.
    static::deleted(function ($model) {
        // Logic sau khi xóa
    });
*/
