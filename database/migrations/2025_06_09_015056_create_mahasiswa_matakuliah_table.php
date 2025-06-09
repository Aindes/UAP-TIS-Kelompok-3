<?php
// database/migrations/xxxx_xx_xx_create_mahasiswa_matakuliah_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->string('mahasiswa_nim'); // Foreign Key 
            $table->unsignedInteger('matakuliah_id'); // Foreign Key 
            $table->primary(['mahasiswa_nim', 'matakuliah_id']); // Composite PK
            $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliahs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};