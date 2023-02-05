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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id');
            $table->string('invoice');
            $table->integer('kuantitas');
            $table->integer('total_harga');
            $table->string('status_pembayaran');
            $table->string('resi');
            $table->string('dari_kota');
            $table->string('tujuan_kota');
            $table->integer('onkir');
            $table->timestamp('waktu_pembayaran');
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
        Schema::dropIfExists('pembelians');
    }
};
