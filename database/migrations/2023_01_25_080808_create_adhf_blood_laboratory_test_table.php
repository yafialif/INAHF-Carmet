<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAdhfBloodLaboratoryTestTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('adhfbloodlaboratorytest',function(Blueprint $table){
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("hemoglobin");
            $table->string("hematocrite");
            $table->string("erythrocyte");
            $table->string("random_blood_glucose");
            $table->string("fasting_blood_glucose");
            $table->string("twoHoursPostPrandialBloodGlucose");
            $table->string("natrium");
            $table->string("kalium");
            $table->string("ureum");
            $table->string("bun");
            $table->string("serum_creatinine");
            $table->string("gfr");
            $table->string("uric_acid");
            $table->string("NT_ProBNP_at_admission");
            $table->string("NT_ProBNP_at_discharge");
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
        Schema::drop('adhfbloodlaboratorytest');
    }

}