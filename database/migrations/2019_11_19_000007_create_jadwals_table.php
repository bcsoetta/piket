<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tugas');

            $table->date('tanggal_awal');

            $table->time('waktu_mulai_kerja');

            $table->time('waktu_selesai_kerja');

            $table->string('nomor_kontak');

            $table->date('tanggal_akhir');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
