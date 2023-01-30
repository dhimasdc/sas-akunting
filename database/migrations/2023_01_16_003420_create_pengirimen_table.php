<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->enum('jenis', ['penjualan', 'pembelian']);
            $table->bigInteger('kontak_id')->unsigned()->nullable();
            $table->string('referensi')->nullable();
            $table->datetime('tanggal_pengiriman');
            $table->bigInteger('biaya_pengiriman');
            $table->enum('status', ['Diproses', 'Dikirim', 'Sampai', 'Selesai']);
            $table->string('ekspedisi');
            $table->string('nomor_resi', 50);
            $table->bigInteger('pembelian_id')->unsigned()->nullable();
            $table->bigInteger('penjualan_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('kontak_id')->references('id')->on('kontaks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengirimen');
    }
};
