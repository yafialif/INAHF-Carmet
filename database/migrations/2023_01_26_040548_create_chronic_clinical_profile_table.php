<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChronicClinicalProfileTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chronicclinicalprofile', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("height")->nullable();
            $table->string("weight")->nullable();
            $table->string("bmi")->nullable();
            $table->string("sbp")->nullable();
            $table->string("dbp")->nullable();
            $table->string("hr")->nullable();
            $table->string("dyspnoeaOnExertion")->nullable();
            $table->string("orthopnea")->nullable();
            $table->string("pnd")->nullable();
            $table->string("peripheralOedema")->nullable();
            $table->string("pulmonaryRales")->nullable();
            $table->string("jvp")->nullable();
            $table->string("ahaStaging")->nullable();
            $table->string("nyhaClass")->nullable();
            $table->string("etiology")->nullable();
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
