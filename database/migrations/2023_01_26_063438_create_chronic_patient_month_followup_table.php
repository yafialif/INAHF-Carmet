<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChronicPatientMonthFollowUpTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chronicpatientmonthfollowup', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->integer("monthfollowup_id")->references("id")->on("monthfollowup");
            $table->string("peripheralOedema")->nullable();
            $table->string("nyhaClass")->nullable();
            $table->string("sbp")->nullable();
            $table->string("dbp")->nullable();
            $table->string("hr")->nullable();
            $table->string("echoEf")->nullable();
            $table->string("echoTapse")->nullable();
            $table->string("echoEdv")->nullable();
            $table->string("echoEsv")->nullable();
            $table->string("echoEdd")->nullable();
            $table->string("echoEsd")->nullable();
            $table->string("echoSignMr")->nullable();
            $table->string("echoDiastolicFunction")->nullable();
            $table->string("acei")->nullable();
            $table->string("aceiDose")->nullable()->nullable();
            $table->string("aceiIntolerance")->nullable();
            $table->string("arb")->nullable();
            $table->string("arbDose")->nullable();
            $table->string("arniDose")->nullable();
            $table->string("betaBlocker")->nullable();
            $table->string("betaBlockerDose")->nullable();
            $table->string("betaBlockerIntolerance")->nullable();
            $table->string("mraDose")->nullable();
            $table->string("mraIntolerance")->nullable();
            $table->string("sglt2i")->nullable();
            $table->string("sglt2iDose")->nullable();
            $table->string("loopDiureticDose")->nullable();
            $table->string("ivabradineDose")->nullable();
            $table->string("insulin")->nullable();
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
