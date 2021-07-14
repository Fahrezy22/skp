<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atasan_penilai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_atasan');
            $table->string('nip');
            $table->string('golongan');
            $table->string('jabatan');
            $table->string('unit_kerja');
            $table->dateTime('created_at')->useCurrent() ;
            $table->dateTime('updated_at')->useCurrent() ;
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atasan_penilai');
    }
}
