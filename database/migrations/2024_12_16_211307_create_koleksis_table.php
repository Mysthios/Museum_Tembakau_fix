<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoleksisTable extends Migration
{
    public function up()
    {
        Schema::create('koleksis', function (Blueprint $table) {
            $table->id('koleksi_id');
            $table->string('judul');
            $table->string('deskripsi_singkat');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->timestamps();

            });
    }

    public function down()
    {
        Schema::dropIfExists('koleksis');
    }
}
