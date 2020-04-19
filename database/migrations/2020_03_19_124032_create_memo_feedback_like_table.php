<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoFeedbackLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memo_feedback_like', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('memo_feedback_id');
            $table->bigInteger('user_id');
            $table->bigInteger('type')->default(1);
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
        Schema::dropIfExists('memo_feedback_like');
    }
}
