<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->comment('アンケートID');
            $table->string('question')->nullable()->comment('設問タイトル');
            $table->string('type')->nullable()->comment('設問タイプ(input/text/select/check/radio)');
            $table->text('option')->nullable()->comment('選択肢（select/check/radio用）');
            $table->integer('created_id')->nullable()->comment('登録者ID');
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
        Schema::dropIfExists('question_details');
    }
}
