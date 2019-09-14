<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestquestionsscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testquestionsscs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userid');
            $table->integer('testid');
            $table->integer('questionid');
            $table->string('selectedAnswer');
            $table->integer('correctOrWrong');
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
        Schema::dropIfExists('testquestionsscs');
    }
}
