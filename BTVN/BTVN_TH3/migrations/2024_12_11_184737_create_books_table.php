<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title');
            $table->string('author');
            $table->integer('publication_year');
            $table->string('genre');
            $table->foreignId('library_id') // Foreign key
                  ->constrained('libraries') // Links to libraries.id
                  ->onDelete('cascade'); // Cascade delete if the library is deleted
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
