<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcarasTable extends Migration
{
    public function up()
    {
        Schema::create('acaras', function (Blueprint $table) {
            $table->id('acara_id');
            $table->string('nama_acara');
            $table->date('tanggal_acara');
            $table->string('deskripsi_singkat');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('google_map_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acaras');
    }
}
