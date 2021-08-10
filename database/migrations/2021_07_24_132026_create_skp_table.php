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
            $table->date('tanggal_awal');
            $table->date('tanggal_batas');
            $table->float('skp');
            $table->float('jumlah_skp');
            $table->integer('orientasi_pelayanan')->nullable();
            $table->integer('integritas')->nullable();
            $table->integer('komitmen')->nullable();
            $table->integer('disiplin')->nullable();
            $table->integer('kerjasama')->nullable();
            $table->integer('kepemimpinan')->nullable();
            $table->integer('jumlah_perilaku');
            $table->string('nilai_perilaku');
            $table->string('nilai_rata_rata');
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
