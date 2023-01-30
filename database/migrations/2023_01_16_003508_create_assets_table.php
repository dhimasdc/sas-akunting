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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gambar')->nullable();
            $table->string('kode');
            $table->datetime('tanggal_pembelian');
            $table->bigInteger('harga_nilai');
            $table->bigInteger('qty');
            $table->bigInteger('satuan_id')->unsigned()->nullable();
            $table->bigInteger('harga_total');
            $table->bigInteger('akun_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('set null');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
};
