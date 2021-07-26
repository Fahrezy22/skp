<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skp', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_skp');
            $table->integer('skp');
            $table->integer('jumlah_skp');
            $table->integer('orientasi_pelayanan');
            $table->integer('integritas');
            $table->integer('komitmen');
            $table->integer('disiplin');
            $table->integer('kerjasama');
            $table->integer('kepemimpinan');
            $table->integer('jumlah_perilaku');
            $table->string('nilai_perilaku');
            $table->string('jumlah_nilai_perilaku');
            $table->string('nilai_prestasi');
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->foreignId('penilai_id')->constrained('penilai');
            $table->foreignId('atasan_id')->constrained('atasan_penilai');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skp');
    }
}
