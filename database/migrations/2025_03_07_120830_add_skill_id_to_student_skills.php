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
        Schema::table('student_skills', function (Blueprint $table) {
            $table->foreignId('skill_id')->after('student_id')->constrained('skills')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('student_skills', function (Blueprint $table) {
            $table->dropForeign(['skill_id']);
            $table->dropColumn('skill_id');
        });
    }
};
