<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->nullable()->comment('questionsのid');
			$table->integer('question_detail_id')->nullable()->comment('question_detailのid');
            $table->text('answer', 65535)->nullable()->comment('アンケートの回答（選択肢は改行区切り）');
            $table->integer('created_id')->nullable()->comment('登録者ID');
            $table->integer('answered_id')->nullable()->comment('回答者ID');
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
        Schema::dropIfExists('question_replies');
    }
}
