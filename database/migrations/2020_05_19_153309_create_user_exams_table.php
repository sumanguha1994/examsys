<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExamsTable extends Migration
{
    public function up()
    {
        Schema::create('user_exams', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_id');
            $table->string('exam_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_exams');
    }
}
