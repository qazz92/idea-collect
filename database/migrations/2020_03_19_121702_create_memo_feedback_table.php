<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemoFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memo_feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('contents');
            $table->unsignedBigInteger('memo_id');
            $table->bigInteger('user_id');
            $table->bigInteger('like_count')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memo_feedback');
    }
}
