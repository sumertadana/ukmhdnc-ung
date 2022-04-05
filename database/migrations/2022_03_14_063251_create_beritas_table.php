<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('berita', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('judul');
        //     $table->text('deskripsi');
        //     $table->string('gambar');
        //     $table->string('penulis');
        //     $table->string('bidang');
        //     $table->integer('view');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita');
    }
}
