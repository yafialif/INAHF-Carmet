<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChronicBloodLaboratoryTestTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chronicbloodlaboratorytest', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("hemoglobin")->nullable();
            $table->string("hematocrite")->nullable();
            $table->string("erythrocyte")->nullable();
            $table->string("hbA1C")->nullable();
            $table->string("fastingBloodGlucose")->nullable();
            $table->string("twoHoursPostPrandialBloodGlucose")->nullable();
            $table->string("natrium")->nullable();
            $table->string("kalium")->nullable();
            $table->string("ureum")->nullable();
            $table->string("bun")->nullable();
            $table->string("serumCreatinine")->nullable();
            $table->string("gfr")->nullable();
            $table->string("nt_ProBnp")->nullable();
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
