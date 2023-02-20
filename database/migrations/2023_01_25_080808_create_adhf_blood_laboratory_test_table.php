<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAdhfBloodLaboratoryTestTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('adhfbloodlaboratorytest', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("hemoglobin")->nullable();
            $table->string("hematocrite")->nullable();
            $table->string("erythrocyte")->nullable();
            $table->string("random_blood_glucose")->nullable();
            $table->string("fasting_blood_glucose")->nullable();
            $table->string("twoHoursPostPrandialBloodGlucose")->nullable();
            $table->string("natrium")->nullable();
            $table->string("kalium")->nullable();
            $table->string("ureum")->nullable();
            $table->string("bun")->nullable();
            $table->string("serum_creatinine")->nullable();
            $table->string("gfr")->nullable();
            $table->string("uric_acid")->nullable();
            $table->string("NT_ProBNP_at_admission")->nullable();
            $table->string("NT_ProBNP_at_discharge")->nullable();
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
