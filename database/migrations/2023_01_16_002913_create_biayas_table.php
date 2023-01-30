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
        Schema::create('biayas', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->foreign();
            $table->bigInteger('piutang')->nullable();
            $table->bigInteger('hutang')->nullable();
            $table->bigInteger('kontak_id')->unsigned()->nullable();
            $table->datetime('tanggal_transaksi');
            $table->datetime('tanggal_jatuh_tempo')->nullable();
            $table->datetime('tanggal_pelunasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biayas');
    }
};
