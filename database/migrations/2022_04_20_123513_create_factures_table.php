<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->integer('FactureNumber');
            $table->string('UserName');
            /*  $table->integer('customer_id');
             $table->string('status'); */
            $table->integer('RoomNumber');
            $table->integer('RoomPrice');
            $table->string('CompanyName');
            $table->string('FacilitiesName_Prixunitaire');
            $table->string('FoodName_Prixunitaire_Quantite');
            $table->string('Prixtotal');
            $table->string('Check_in');
            $table->string('Check_out');

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
        Schema::dropIfExists('factures');
    }
};
