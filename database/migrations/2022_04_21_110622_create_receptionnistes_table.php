<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptionnistes', function (Blueprint $table) {
            $table->integer('idroom');
            $table->integer('idbooking');
            $table->integer('idclient');
            $table->integer('idfacture');
            $table->integer('tarifs');
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
        Schema::dropIfExists('receptionnistes');
    }
};
