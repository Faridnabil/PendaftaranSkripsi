<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_sidang', function (Blueprint $table) {
            $table->id();
            $table->string('batas_bimbingan', 50);
            $table->string('status',50);
            $table->unsignedBigInteger('nim_mahasiswa');
            $table->foreign('nim_mahasiswa')->references('nim')->on('mahasiswa');
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
        Schema::dropIfExists('nota_sidang');
    }
}
