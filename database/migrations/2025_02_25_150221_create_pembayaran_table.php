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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keluarga_id')->constrained('keluarga')->onDelete('cascade');
            $table->date('tanggal_pembayaran'); // Tanggal Pembayaran
            $table->integer('nominal'); // Nominal Kas Masuk
            $table->string('bulan')->nullable(); // Kolom string untuk bulan
            $table->string('bukti_pembayaran')->nullable(); // Bukti Pembayaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropColumn('bulan');
        });
    }
};
