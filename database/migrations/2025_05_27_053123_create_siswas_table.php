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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('foto_siswa')->nullable();
            $table->string('nama');
            $table->string('nis')->unique();
            $table->enum('gender', ['L','P'])->default('L');
            $table->text('alamat');
            $table->string('kontak');
            $table->string('email')->unique();
            $table->boolean('status_pkl')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
