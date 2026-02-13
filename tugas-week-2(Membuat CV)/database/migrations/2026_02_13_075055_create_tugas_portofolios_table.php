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
    Schema::create('tugas_portofolios', function (Blueprint $table) {
        $table->id();
        $table->string('judul');        // Untuk nama proyek/pekerjaan
        $table->text('deskripsi');      // Untuk penjelasan detail
        $table->string('kategori');     // Contoh: Web Design, Mobile Dev
        $table->string('gambar')->nullable(); // Link foto proyek (opsional)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_portofolios');
    }
};
