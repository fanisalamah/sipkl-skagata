<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_logbooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internship_submission_id')->constrained('internship_submissions');
            $table->date('date');
            $table->text('activity');
            $table->string('attachment_file');
            $table->string('note');
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
        Schema::dropIfExists('internship_logbooks');
    }
}
