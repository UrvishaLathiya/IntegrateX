<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign(['student_id']); // Remove foreign key
            $table->dropColumn('student_id'); // Remove column
        });
    }

    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }
};
