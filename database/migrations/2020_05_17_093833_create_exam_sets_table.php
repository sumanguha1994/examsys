<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSetsTable extends Migration
{
    public function up()
    {
        Schema::create('exam_sets', function (Blueprint $table) {
            $table->id();
            $table->string('exam_id')->nullable();
            $table->string('set_name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam_sets');
    }
}
