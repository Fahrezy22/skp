<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Skp extends Migration
{
    public function up()
    {
        Schema::create('skp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pegawai');
            $table->date('tanggal_skp');
            $table->integer('orientasi_pelayanan');
            $table->integer('integritas');
            $table->integer('komitmen');
            $table->integer('disiplin');
            $table->integer('kerjasama');
            $table->integer('kepemimpinan');
            $table->integer('jumlah_perilaku');
            $table->string('nilai_perilaku');
            $table->string('status_skp');
            $table->dateTime('created_at')->useCurrent() ;
            $table->dateTime('updated_at')->useCurrent() ;
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('skp');
    }
}
