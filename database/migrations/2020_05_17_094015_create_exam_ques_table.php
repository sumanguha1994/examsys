<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuesTable extends Migration
{
    public function up()
    {
        Schema::create('exam_ques', function (Blueprint $table) {
            $table->id();
            $table->string('exam_set_id')->nullable();
            $table->string('question')->nullable();
            $table->string('ans_a')->nullable();
            $table->string('ans_b')->nullable();
            $table->string('ans_c')->nullable();
            $table->string('ans_d')->nullable();
            $table->string('ans_e')->nullable();
            $table->string('currect_ans')->nullable();
            $table->string('marks')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam_ques');
    }
}
