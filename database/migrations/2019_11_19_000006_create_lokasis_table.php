<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasisTable extends Migration
{
    public function up()
    {
        Schema::create('lokasis', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
