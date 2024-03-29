<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipMonthlyReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_monthly_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internship_submission_id')->constrained('internship_submissions');
            $table->string('title');
            $table->string('file');
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
        Schema::dropIfExists('internship_monthly_reports');
    }
}
