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
        Schema::create('item_pembelian_penawarans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produk_id')->unsigned()->nullable();
            $table->bigInteger('pembelian_id')->unsigned()->nullable();
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
            $table->foreign('pembelian_id')->references('id')->on('pembelian__penawarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_pembelian_penawarans');
    }
};
