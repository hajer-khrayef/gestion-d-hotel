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
        Schema::create('societés', function (Blueprint $table) {
            //$table->id();
            $table->integer('idsociete');
            $table->string('nomsociete');
            $table->string('emailsociete');
            $table->string('numsociete');
            $table->string('faxsociete');
            $table->string('addressesociete');
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
        Schema::dropIfExists('societés');
    }
};
