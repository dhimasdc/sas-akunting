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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id')->unsigned()->nullable();
            $table->string('name');
            $table->enum('jenis', ['Produk', 'Paket', 'Manufaktur']);
            $table->string('sku');
            $table->string('gambar')->nullable();
            $table->bigInteger('akun_inventory_id')->unsigned()->nullable();
            $table->bigInteger('gudang_id')->unsigned()->nullable();
            $table->bigInteger('satuan_id')->unsigned()->nullable();;
            $table->longtext('deskripsi')->nullable();
            $table->string('attachment')->nullable();
            $table->bigInteger('harga_beli')->nullable();
            $table->bigInteger('harga_jual')->nullable();
            $table->bigInteger('grosir_minimal')->nullable();
            $table->enum('grosir_tipe', ['Rp', '%'])->nullable();
            $table->bigInteger('grosir_harga')->nullable();
            $table->bigInteger('stok_min')->nullable();
            $table->bigInteger('manufaktur_produk')->nullable();
            $table->bigInteger('manufaktur_kuantitas')->nullable();
            $table->bigInteger('manufaktur_harga')->nullable();
            $table->bigInteger('akun_manufaktur_id')->unsigned()->nullable();
            $table->bigInteger('stok_id')->nullable();
            $table->bigInteger('produksi_biaya')->nullable();
            $table->bigInteger('total_dibayar')->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('set null');
            $table->foreign('akun_inventory_id')->references('id')->on('akuns')->onDelete('set null');
            $table->foreign('akun_manufaktur_id')->references('id')->on('akuns')->onDelete('set null');
            $table->foreign('gudang_id')->references('id')->on('gudangs')->onDelete('set null');
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
        Schema::dropIfExists('produks');
    }
};
