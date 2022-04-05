<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('jabatan', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('jabatan');
        //     $table->unsignedBigInteger('id_bidang');
        //     $table->timestamps();

        //     $table->foreign('id_bidang')
        //         ->references('id')
        //         ->on('bidang')
        //         ->onUpdate()
        //         ->onDelete();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jabatan');
    }
}
