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
        Schema::table('pengirimen', function (Blueprint $table) {

            $table->bigInteger('pemesanan_id')->unsigned()->nullable();
            $table->foreign('pemesanan_id')->references('id')->on('penjualan__pesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengirimen', function (Blueprint $table) {
            //
        });
    }
};
