<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengetahuans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('file');
            $table->integer('view')->default(0);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengetahuans');
    }
};
