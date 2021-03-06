<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('nip');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('pangkat');
            $table->string('golongan');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('no_hp');
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
        Schema::dropIfExists('pegawai');
    }
}
