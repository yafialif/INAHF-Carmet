<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAdhfRiskFactorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('adhfriskfactors', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("hypertension")->nullable();
            $table->string("diabetes_or_prediabetes")->nullable();
            $table->string("dislipidemia")->nullable();
            $table->string("alcohol")->nullable();
            $table->string("smoker")->nullable();
            $table->string("ckd")->nullable();
            $table->string("valvular_heart_disease")->nullable();
            $table->string("atrial_fibrillation")->nullable();
            $table->string("history_of_hf")->nullable();
            $table->string("history_of_pci_or_cabg")->nullable();
            $table->string("historyof_heart_valve_surgery")->nullable();
            $table->string("omi_or_cad")->nullable();
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
        Schema::drop('adhfriskfactors');
    }
}
