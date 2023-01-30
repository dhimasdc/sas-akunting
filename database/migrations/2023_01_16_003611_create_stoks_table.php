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
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe', ['Perhitungan Stok', 'Stok Masuk/Keluar']);
            $table->string('kode');
            $table->bigInteger('akun_id')->unsigned()->nullable();
            $table->datetime('tanggal');
            $table->bigInteger('qty_tercatat');
            $table->bigInteger('qty_aktual');
            $table->bigInteger('qty_selisih');
            $table->bigInteger('satuan')->nullable();
            $table->bigInteger('harga_rata')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('stoks');
    }
};
