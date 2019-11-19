<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJadwalsTable extends Migration
{
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->unsignedInteger('bidang_id');

            $table->foreign('bidang_id', 'bidang_fk_617531')->references('id')->on('bidangs');

            $table->unsignedInteger('seksi_id');

            $table->foreign('seksi_id', 'seksi_fk_617532')->references('id')->on('seksis');

            $table->unsignedInteger('lokasi_id');

            $table->foreign('lokasi_id', 'lokasi_fk_617533')->references('id')->on('lokasis');

            $table->unsignedInteger('petugas_id');

            $table->foreign('petugas_id', 'petugas_fk_621736')->references('id')->on('petugas');
        });
    }
}
