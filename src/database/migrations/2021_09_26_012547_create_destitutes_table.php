<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestitutesTable extends Migration
{
    public function up()
    {
        Schema::create('destitutes', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->string('address');
            $table->dateTime('added_at');
            $table->dateTime('deleted_at')->nullable();
            $table->integer('family_counts')->default(1);
            $table->foreignId('sonko_id')
                ->constrained('sonkos')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('destitutes');
    }
}
