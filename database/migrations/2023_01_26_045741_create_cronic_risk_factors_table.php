<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateCronicRiskFactorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('cronicriskfactors', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("hypertension")->nullable();
            $table->string("diabetesorPrediabetes")->nullable();
            $table->string("dislipidemia")->nullable();
            $table->string("alcohol")->nullable();
            $table->string("smoker")->nullable();
            $table->string("ckd")->nullable();
            $table->string("atrialFibrillation")->nullable();
            $table->string("bundleBranchBlock")->nullable();
            $table->string("historyofCad")->nullable();
            $table->string("historyofHf")->nullable();
            $table->string("historyofPciorCabg")->nullable();
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
