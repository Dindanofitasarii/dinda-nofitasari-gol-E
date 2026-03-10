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
    Schema::create('outlets', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique(); // Kode outlet (Contoh: OUT-001)
        $table->string('name');           // Nama Outlet
        $table->text('address');         // Alamat Lengkap
        $table->string('phone');          // Nomor Telepon
        $table->enum('status', ['Aktif', 'Non-Aktif'])->default('Aktif');
        $table->timestamps();             // Otomatis membuat created_at & updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};
