<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->enum('grade_level',['Pre-K', 'Kindergarten']);
            $table->string('room_number',10);
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('classes');
    }
};
