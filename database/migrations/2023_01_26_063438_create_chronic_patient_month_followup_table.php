<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChronicPatientMonthFollowUpTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chronicpatientmonthfollowup',function(Blueprint $table){
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->integer("monthfollowup_id")->references("id")->on("monthfollowup");
            $table->string("peripheralOedema");
            $table->string("nyhaClass");
            $table->string("sbp");
            $table->string("dbp");
            $table->string("hr");
            $table->string("echoEf");
            $table->string("echoTapse");
            $table->string("echoEdv");
            $table->string("echoEdd");
            $table->string("echoEsd");
            $table->string("echoSignMr");
            $table->string("echoDiastolicFunction");
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
            $table->string("loopDiureticDose");
            $table->string("ivabradineDose");
            $table->string("insulin");
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
        Schema::drop('chronicpatientmonthfollowup');
    }

}