<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('book_list_book_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_list_id')->constrained()->cascadeOnDelete();
            $table->foreignId('book_log_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_list_book_log');
    }
};