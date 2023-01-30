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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('biaya_id')->unsigned()->nullable();
            $table->bigInteger('transaksi_id')->unsigned()->nullable();
            $table->bigInteger('kontak_id')->unsigned()->nullable();
            $table->string('referensi')->nullable();
            $table->datetime('tanggal_transaksi');
            $table->datetime('tanggal_jatuh_tempo')->nullable();
            $table->enum('status', ['Dibayar', 'Dibayar Sebagian', 'Lunas']);
            $table->bigInteger('sisa_tagihan')->nullable();
            $table->bigInteger('sub_total');
            $table->bigInteger('pajak')->nullable();
            $table->bigInteger('total');
            $table->string('termin')->nullable();
            $table->bigInteger('akun_id')->unsigned()->nullable();
            $table->string('attachment')->nullable();
            $table->text('pesan')->nullable();
            $table->timestamps();

            $table->foreign('biaya_id')->references('id')->on('biayas')->onDelete('set null');
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('set null');
            $table->foreign('kontak_id')->references('id')->on('kontaks')->onDelete('set null');
            $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
};
