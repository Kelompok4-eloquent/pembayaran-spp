<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->integer('id_petugas')->unsigned();
            $table->char('nisn', 10);
            $table->dateTime('tanggal_bayar');
            $table->string('bulan_dibayar',50)->nullable();
            $table->string('tahun_dibayar',20)->nullable();
            $table->integer('jumlah_bayar')->unsigned();
            $table->integer('jumlah_dibayar')->unsigned()->nullable();
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
        Schema::dropIfExists('pembayaran');
    }
}
