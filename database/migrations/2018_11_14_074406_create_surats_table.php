<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('surats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_surat');
            $table->string('nomor_surat');
            $table->string('asal_surat');
            $table->string('sifat');
            $table->string('perihal');
            $table->string('tujuan_surat');            
            $table->date('tgl_surat');
            $table->string('status');
            $table->string('file');
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
        Schema::dropIfExists('surats');
    }
}
