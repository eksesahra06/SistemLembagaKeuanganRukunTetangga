<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->decimal('nominal', 15, 2);
            $table->date('tanggal_pengeluaran'); // Tanggal Pengeluaran
            $table->integer('nominal'); // Nominal Pengeluaran
            $table->string('tujuan'); // Tujuan Pengeluaran
            $table->string('bukti_pengeluaran')->nullable(); // Bukti Pengeluaran (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
