<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('jurusan', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('jurusan');
        //     $table->unsignedBigInteger('id_fakultas');
        //     $table->timestamps();

        //     $table->foreign('id_fakultas')->references('id')->on('fakutas')->onUpdate()->onDelete();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
}
