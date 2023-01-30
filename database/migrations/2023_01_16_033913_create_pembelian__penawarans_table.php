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
        Schema::create('pembelian__penawarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->bigInteger('kontak_id')->unsigned()->nullable();
            $table->string('referensi')->nullable();
            $table->string('tags')->nullable();
            $table->datetime('tanggal_transaksi');
            $table->datetime('kadaluarsa')->nullable();
            $table->enum('status', ['Open', 'Disetujui', 'Ditolak', 'Selesai']);
            $table->bigInteger('sub_total');
            $table->bigInteger('biaya_pengiriman')->nullable();
            $table->bigInteger('diskon')->nullable();
            $table->bigInteger('pajak')->nullable();
            $table->bigInteger('total');
            $table->string('termin')->nullable();
            $table->string('attachment')->nullable();
            $table->text('pesan')->nullable();
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
        Schema::dropIfExists('pembelian__penawarans');
    }
};
