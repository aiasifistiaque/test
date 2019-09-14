<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSSCBoardQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_s_c_board_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('question');
            $table->string('optionOne');
            $table->string('optionTwo');
            $table->string('optionThree');
            $table->string('optionFour');
            $table->string('answer');
            $table->string('subject');
            $table->string('board');
            $table->integer('year');
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
        Schema::dropIfExists('s_s_c_board_questions');
    }
}
