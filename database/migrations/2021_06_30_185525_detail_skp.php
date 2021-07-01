<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailSkp extends Migration
{
    public function up()
    {
        Schema::create('detail_skp', function (Blueprint $table) {
            $table->id();
            $table->string('ktj_target_skp');
            $table->integer('ak_target_skp');
            $table->integer('output_target_skp');
            $table->string('sat_output_target_skp');
            $table->integer('mutu_target_skp');
            $table->integer('waktu_target_skp');
            $table->string('sat_waktu_target_skp');
            $table->integer('biaya_target_skp');
            $table->string('ak_realisasi_skp');
            $table->string('output_realisasi_skp');
            $table->string('sat_output_realisasi_skp');
            $table->string('mutu_realisasi_skp');
            $table->string('waktu_realisasi_skp');
            $table->string('sat_waktu_realisasi_skp');
            $table->string('biaya_realisasi_skp');
            $table->string('perhitungan');
            $table->string('nilai_capaian');
            $table->string('result_output');
            $table->string('result_mutu');
            $table->string('resutl_waktu');
            $table->string('resutl_biaya');
            $table->dateTime('created_at')->useCurrent() ;
            $table->dateTime('updated_at')->useCurrent() ;
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_skp');
    }
}
