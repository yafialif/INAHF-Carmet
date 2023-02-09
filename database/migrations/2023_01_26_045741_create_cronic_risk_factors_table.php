<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateCronicRiskFactorsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('cronicriskfactors',function(Blueprint $table){
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("hypertension");
            $table->string("diabetesorPrediabetes");
            $table->string("dislipidemia");
            $table->string("alcohol");
            $table->string("smoker");
            $table->string("ckd");
            $table->string("atrialFibrillation");
            $table->string("bundleBranchBlock");
            $table->string("historyofCad");
            $table->string("historyofHf");
            $table->string("historyofPciorCabg");
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
        Schema::drop('cronicriskfactors');
    }

}