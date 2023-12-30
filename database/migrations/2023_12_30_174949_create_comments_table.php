<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            // $table->id(); // chỉ được phép có một khóa chính , nên có comment_id rồi thì bỏ $table->id(); đi
            $table->bigIncrements('comment_id'); // tự động tăng khi thêm bảng ghi // nó tương tự với id
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('cmt_reply_id')->nullable();
            $table->longText('comment_content');
            $table->timestamp('comment_created_at')->useCurrent();
            $table->timestamp('comment_updated_at')->useCurrent();
            $table->timestamps();
        });

        /*
            mục đích của việc thêm cột mới tự động tăng comment_id
            thực ra ta nên đặt là : comment_id , comment_content , comment_created_at , comment_updated_at
            thay vì đặt là : id , content , created_at , updated_at
            => để sau này khi join các bảng lại với nhau ta khỏi phải đi đặt tên lại các trường trong trường hợp
            các trường trùng nhau , mặc khác khi nhìn vào ta cũng dễ nhận biết được đây là các trường của bảng nào
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
