<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pegawai extends Migration
{
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('nip');
            $table->string('nama_pp');
            $table->string('nama_app');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('pangkat');
            $table->integer('kode_pangkat');
            $table->string('golongan');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('unit_kerja');
            $table->date('created_at')->useCurrent() ;
            $table->date('updated_at')->useCurrent() ;
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
