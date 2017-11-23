<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function(Blueprint $table) {
            $table->increments('id');
            $table->string('academic_year', 20);
            $table->string('semester', 3);
            $table->unsignedInteger('course_id');
            $table->datetime('exam_schedule');
            $table->integer('attendance')->nullable();
            $table->string('exam_type');
            $table->unsignedInteger('examiner');
            $table->string('status')->default('Pending');
            $table->jsonb('performance_analysis')->nullable();
            $table->unsignedInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
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
        //
    }
}
