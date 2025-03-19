<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('placement_officers', function (Blueprint $table) {
            $table->id();
            $table->string('officer_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('role');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('placement_officers');
    }
};
