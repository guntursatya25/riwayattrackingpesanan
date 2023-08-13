<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('Pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan',20);
            $table->string('nama_pelanggan',25);
            $table->string('email',40);
            $table->string('whatsapp',20);
            $table->text('address');
            $table->string('pesanan',25);
            $table->string('jumlah',25);
             $table->enum('status', ['done', 'proses','dikirim']);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('Pesanan');
    }
};
