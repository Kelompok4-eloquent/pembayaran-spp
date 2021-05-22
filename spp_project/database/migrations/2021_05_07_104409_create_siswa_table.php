<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
                $table->char('nisn', 10)->primary();
                $table->char('nis', 10)->unique();
                $table->string('nama',100)->nullable();
                $table->integer('id_kelas')->unsigned();
                $table->longText('alamat')->nullable();
                $table->string('no_telp',18)->nullable();
                $table->integer('id_spp')->unsigned();
                $table->string('foto',255)->nullable();
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
        Schema::dropIfExists('siswa');
    }
}
