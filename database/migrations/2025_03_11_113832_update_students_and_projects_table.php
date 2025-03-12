<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Modify the projects table
        Schema::table('projects', function (Blueprint $table) {
            $table->dropPrimary(); // Remove existing primary key
            $table->unsignedBigInteger('student_id')->primary()->change(); // Set student_id as primary key
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });

        // Modify the students table
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasColumn('students', 'project_id')) {
                $table->unsignedBigInteger('project_id')->nullable()->after('id');
                $table->foreign('project_id')->references('student_id')->on('projects')->onDelete('set null');
            }
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropPrimary();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropColumn('project_id');
        });
    }
};
