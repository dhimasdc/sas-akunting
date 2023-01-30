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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe', ['Administrasi', 'IT', 'Finance', 'Direktur', 'HRD']);
            $table->string('name');
            $table->bigInteger('biaya_id')->unsigned()->nullable();
            $table->text('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->timestamps();

            $table->foreign('biaya_id')->references('id')->on('biayas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
};
