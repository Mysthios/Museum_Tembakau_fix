<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id('tiket_id');
            $table->string('tipe_tiket');
            $table->decimal('harga', 10, 2);
            $table->string('nama_pembeli');
            $table->string('phone_number');
            $table->date('tanggal_pembelian');
            $table->date('tanggal_kunjungan');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tikets');
    }
}
