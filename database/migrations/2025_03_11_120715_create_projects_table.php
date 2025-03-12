<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Foreign Key
            $table->string('project_name');
            $table->string('frontend');
            $table->string('backend');
            $table->string('database');
            $table->string('live_demo')->nullable();
            $table->text('description');
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
