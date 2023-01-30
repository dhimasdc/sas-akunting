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
        Schema::create('item_penjualan_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produk_id')->unsigned()->nullable();
            $table->bigInteger('penjualan_id')->unsigned()->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('qty');
            $table->bigInteger('satuan_id')->unsigned()->nullable();
            $table->decimal('discount')->nullable();
            $table->bigInteger('harga');
            $table->bigInteger('pajak')->nullable();
            $table->bigInteger('jumlah');
            $table->timestamps();

            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('set null');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('set null');
            $table->foreign('penjualan_id')->references('id')->on('penjualan__pesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_penjualan_pemesanans');
    }
};
