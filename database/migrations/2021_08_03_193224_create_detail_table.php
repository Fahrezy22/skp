<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_skp', function (Blueprint $table) {
            $table->id();
            $table->string('ktj');
            $table->string('ak');
            $table->string('output');
            $table->string('mutu');
            $table->string('waktu');
            $table->string('biaya')->nullable();
            $table->string('mutu_realisasi');
            $table->string('total_ak');
            $table->string('nilai_capaian');
            $table->string('perhitungan');
            $table->foreignId('skp_id')->constrained('skp')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_skp');
    }
}