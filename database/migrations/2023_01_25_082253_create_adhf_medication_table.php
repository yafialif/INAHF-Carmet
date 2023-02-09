<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAdhfMedicationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('adhfmedication',function(Blueprint $table){
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("DopaminDose");
            $table->string("DopaminDuration");
            $table->string("DobutaminDose");
            $table->string("DobutaminDuration");
            $table->string("NorepinephrineDose");
            $table->string("NorepinephrineDuration");
            $table->string("EpinephrinDose");
            $table->string("EpinephrinDuration");
            $table->string("acei");
            $table->string("aceiDoseatAdmission");
            $table->string("aceiDoseatPredischarge");
            $table->string("arb");
            $table->string("arbDoseatAdmission");
            $table->string("arbDoseatPredischarge");
            $table->string("arniDoseatAdmission");
            $table->string("arniDoseatPredischarge");
            $table->string("mraDoseatAdmission");
            $table->string("mraDoseatPredischarge");
            $table->string("BetaBlocker");
            $table->string("BetaBlockerDoseatAdmission");
            $table->string("BetaBlockerDoseatPredischarge");
            $table->string("LoopDiureticDoseatAdmission");
            $table->string("LoopDiureticDoseatPredischarge");
            $table->string("sglt2i");
            $table->string("sglt2iDoseatAdmission");
            $table->string("sglt2iDoseatPredischarge");
            $table->string("ivabradineDoseatAdmission");
            $table->string("ivabradineDoseatPredischarge");
            $table->string("TolvaptanTotalDose");
            $table->string("insulin");
            $table->string("insulinDose");
            $table->string("otherOAD");
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
        Schema::drop('adhfmedication');
    }

}