<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChronicBloodLaboratoryTestTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chronicbloodlaboratorytest',function(Blueprint $table){
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("hemoglobin");
            $table->string("hematocrite");
            $table->string("erythrocyte");
            $table->string("hbA1C");
            $table->string("fastingBloodGlucose");
            $table->string("twoHoursPostPrandialBloodGlucose");
            $table->string("natrium");
            $table->string("kalium");
            $table->string("ureum");
            $table->string("bun");
            $table->string("serumCreatinine");
            $table->string("gfr");
            $table->string("nt_ProBnp");
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
        Schema::drop('chronicbloodlaboratorytest');
    }

}