<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('pengurus', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedInteger('nim');
        //     $table->unsignedBigInteger('id_bidang');
        //     $table->unsignedBigInteger('id_jabatan');
        //     $table->string('periode');
        //     $table->timestamps();

        //     $table->foreign('nim')->references('nim')->on('anggota')->onUpdate()->onDelete();
        //     $table->foreign('id_bidang')->references('id')->on('bidang')->onUpdate()->onDelete();
        //     $table->foreign('id_jabatan')->references('id')->on('jabatan')->onUpdate()->onDelete();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengurus');
    }
}
