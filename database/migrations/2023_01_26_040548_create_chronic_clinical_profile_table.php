<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChronicClinicalProfileTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chronicclinicalprofile',function(Blueprint $table){
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("height");
            $table->string("weight");
            $table->string("bmi");
            $table->string("sbp");
            $table->string("dbp");
            $table->string("hr");
            $table->string("dyspnoeaOnExertion");
            $table->string("orthopnea");
            $table->string("pnd");
            $table->string("peripheralOedema");
            $table->string("pulmonaryRales");
            $table->string("jvp");
            $table->string("ahaStaging");
            $table->string("nyhaClass");
            $table->string("etiology");
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
        Schema::drop('chronicclinicalprofile');
    }

}