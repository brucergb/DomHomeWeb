<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fans', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->string('name');
            $table->enum('mode', ['auto', 'manual'])->default('auto');;
            $table->enum('status', ['on', 'off']);
            $table->unsignedSmallInteger('temperature')->default(25);

            //relaciones
            $table->string('address_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fans');
    }
}
