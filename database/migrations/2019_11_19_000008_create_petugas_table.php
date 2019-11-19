<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasTable extends Migration
{
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama');

            $table->string('nip')->unique();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
