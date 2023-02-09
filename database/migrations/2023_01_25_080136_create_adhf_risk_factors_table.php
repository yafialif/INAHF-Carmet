<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAdhfRiskFactorsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('adhfriskfactors',function(Blueprint $table){
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("hypertension");
            $table->string("diabetes_or_prediabetes");
            $table->string("dislipidemia");
            $table->string("alcohol");
            $table->string("smoker");
            $table->string("ckd");
            $table->string("valvular_heart_disease");
            $table->string("atrial_fibrillation");
            $table->string("history_of_hf");
            $table->string("history_of_pci_or_cabg");
            $table->string("historyof_heart_valve_surgery");
            $table->string("omi_or_cad");
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