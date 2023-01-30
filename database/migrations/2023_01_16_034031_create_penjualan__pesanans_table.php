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
        Schema::create('penjualan__pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->bigInteger('kontak_id')->unsigned()->nullable();
            $table->bigInteger('sales_id')->unsigned()->nullable();
            $table->string('referensi')->nullable();
            $table->string('tags')->nullable();
            $table->datetime('tanggal_transaksi');
            $table->datetime('tanggal_jatuh_tempo')->nullable();
            $table->string('termin')->nullable();
            $table->enum('status', ['Open', 'Selesai', 'Dibatalkan']);
            $table->bigInteger('sisa_tagihan')->nullable();
            $table->bigInteger('sub_total');
            $table->bigInteger('diskon')->nullable();
            $table->bigInteger('biaya_pengiriman')->nullable();
            $table->bigInteger('uang_muka')->nullable();
            $table->bigInteger('pajak')->nullable();
            $table->bigInteger('total')->nullable();
            $table->boolean('info_pengiriman')->default('0');
            $table->datetime('tanggal_pengiriman')->nullable();
            $table->string('kurir')->nullable();
            $table->string('resi')->nullable();
            $table->bigInteger('gudang_id')->unsigned()->nullable();
            $table->string('attachment')->nullable();
            $table->text('pesan')->nullable();
            $table->timestamps();

            $table->foreign('kontak_id')->references('id')->on('kontaks')->onDelete('set null');
            $table->foreign('sales_id')->references('id')->on('karyawans')->onDelete('set null');
            $table->foreign('gudang_id')->references('id')->on('gudangs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan__pesanans');
    }
};
