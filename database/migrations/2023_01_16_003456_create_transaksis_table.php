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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20);
            $table->bigInteger('akun_id')->unsigned()->nullable();
            $table->bigInteger('penjualan_tagihan_id')->unsigned()->nullable();
            $table->bigInteger('pembelian_tagihan_id')->unsigned()->nullable();
            $table->dateTime('tanggal_transaksi');
            $table->string('attachment')->nullable();
            $table->string('referensi')->nullable();
            $table->bigInteger('total_dibayar');
            $table->timestamps();

            $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('set null');
            $table->foreign('penjualan_tagihan_id')->references('id')->on('penjualan__tagihans')->onDelete('set null');
            $table->foreign('pembelian_tagihan_id')->references('id')->on('pembelian__tagihans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
