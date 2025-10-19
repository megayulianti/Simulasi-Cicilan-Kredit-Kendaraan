<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('simulasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('otr');
            $table->decimal('dp_percent',5,2);
            $table->bigInteger('dp_nominal');
            $table->bigInteger('pokok_pinjaman');
            $table->integer('tenor');
            $table->decimal('bunga_tahun',5,2);
            $table->bigInteger('angsuran_per_bulan');
            $table->bigInteger('total_bunga');
            $table->bigInteger('total_pembayaran');
            $table->json('jadwal')->nullable(); // simpan jadwal dalam bentuk JSON
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('simulasi');
    }
};

