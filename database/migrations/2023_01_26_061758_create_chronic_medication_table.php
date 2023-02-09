<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChronicMedicationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chronicmedication',function(Blueprint $table){
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("acei");
            $table->string("aceiDose");
            $table->string("aceiIntolerance");
            $table->string("arb");
            $table->string("arbDose");
            $table->string("arniDose");
            $table->string("betaBlocker");
            $table->string("betaBlockerDose");
            $table->string("betaBlockerIntolerance");
            $table->string("mraDose");
            $table->string("mraIntolerance");
            $table->string("sglt2i");
            $table->string("sglt2iDose");
            $table->string("loopDiuretic");
            $table->string("loopDiureticDose");
            $table->string("ivabradineDose");
            $table->string("insulin");
            $table->string("devices");
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
        Schema::drop('chronicmedication');
    }

}