<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSonkosTable extends Migration
{
    public function up()
    {
        Schema::create('sonkos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('head');
            $table->integer('workers')->default(1);
            $table->tinyText('description')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sonkos');
    }
}
