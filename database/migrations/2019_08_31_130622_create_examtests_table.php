<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examtests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('question');
            $table->string('optionOne');
            $table->string('optionTwo');
            $table->string('optionThree');
            $table->string('optionFour');
            $table->string('correctAnswer');
            $table->string('selectedOption');
            $table->integer('questionid');
            $table->integer('wexamid');
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
        Schema::dropIfExists('examtests');
    }
}
