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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('no_telp',13);
            $table->string('no_rekening')->unique();
            $table->enum('gender',['Male','Female']);
            $table->string('tgl_lahir');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('kode_pos');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
