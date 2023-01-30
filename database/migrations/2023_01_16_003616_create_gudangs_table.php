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
        Schema::create('gudangs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kode');
            $table->bigInteger('total_jumlah')->nullable();
            $table->bigInteger('total_nilai')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->bigInteger('stok_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('stok_id')->references('id')->on('stoks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudangs');
    }
};
