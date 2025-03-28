<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_recruitments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('recruiter_id'); // Foreign key for recruiters
            $table->unsignedBigInteger('officer_id'); // Foreign key for placement officers
            $table->string('company_profile');
            $table->string('job_role');
            $table->decimal('remuneration', 10, 2);
            $table->string('location');
            $table->text('requirements');
            $table->text('interview_process');
            $table->timestamps(); // Created_at & Updated_at

            // Foreign key constraints
            $table->foreign('recruiter_id')->references('id')->on('recruiters')->onDelete('cascade');
            $table->foreign('officer_id')->references('id')->on('placement_officers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campus_recruitments');
    }
};
