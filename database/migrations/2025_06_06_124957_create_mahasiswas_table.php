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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->string('nim')->primary(); // PK 
            $table->string('nama');
            $table->integer('angkatan');
            $table->string('password');
            $table->unsignedInteger('prodi_id'); // Foreign Key 
            $table->foreign('prodi_id')->references('id')->on('prodis')->onDelete('cascade');
            // prodi bagian anggota selanjutnya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
