<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionsscs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('question');
            $table->string('optionOne');
            $table->string('optionTwo');
            $table->string('optionThree');
            $table->string('optionFour');
            $table->string('answer');
            $table->string('courseid');
            $table->string('chapterid')->nullable();
            $table->string('divisionOrYear');
            $table->string('schoolOrBoard');
            $table->string('mediumid')->nullable();
            $table->string('examid')->nullable();
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
        Schema::dropIfExists('questionsscs');
    }
}
