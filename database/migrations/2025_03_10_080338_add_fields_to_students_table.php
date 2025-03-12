<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('project')->nullable();
            $table->string('year')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->enum('placement_status', ['Not Placed', 'Shortlisted', 'Placed'])->default('Not Placed');

            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['project', 'year', 'branch_id', 'placement_status']);
        });
    }
};
