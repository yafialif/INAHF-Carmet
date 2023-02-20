<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAdhfMedicationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('adhfmedication', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("DopaminDose")->nullable();
            $table->string("DopaminDuration")->nullable();
            $table->string("DobutaminDose")->nullable();
            $table->string("DobutaminDuration")->nullable();
            $table->string("NorepinephrineDose")->nullable();
            $table->string("NorepinephrineDuration")->nullable();
            $table->string("EpinephrinDose")->nullable();
            $table->string("EpinephrinDuration")->nullable();
            $table->string("acei")->nullable();
            $table->string("aceiDoseatAdmission")->nullable();
            $table->string("aceiDoseatPredischarge")->nullable();
            $table->string("arb")->nullable();
            $table->string("arbDoseatAdmission")->nullable();
            $table->string("arbDoseatPredischarge")->nullable();
            $table->string("arniDoseatAdmission")->nullable();
            $table->string("arniDoseatPredischarge")->nullable();
            $table->string("mraDoseatAdmission")->nullable();
            $table->string("mraDoseatPredischarge")->nullable();
            $table->string("BetaBlocker")->nullable();
            $table->string("BetaBlockerDoseatAdmission")->nullable();
            $table->string("BetaBlockerDoseatPredischarge")->nullable();
            $table->string("LoopDiureticDoseatAdmission")->nullable();
            $table->string("LoopDiureticDoseatPredischarge")->nullable();
            $table->string("sglt2i")->nullable();
            $table->string("sglt2iDoseatAdmission")->nullable();
            $table->string("sglt2iDoseatPredischarge")->nullable();
            $table->string("ivabradineDoseatAdmission")->nullable();
            $table->string("ivabradineDoseatPredischarge")->nullable();
            $table->string("TolvaptanTotalDose")->nullable();
            $table->string("insulin")->nullable();
            $table->string("insulinDose")->nullable();
            $table->string("otherOAD")->nullable();
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
