<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateClinicalProfileTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('clinicalprofile', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->references("id")->on("user");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("height")->nullable();
            $table->string("weight")->nullable();
            $table->string("bmi")->nullable();
            $table->string("sbp")->nullable();
            $table->string("dbp")->nullable();
            $table->string("hr")->nullable();
            $table->string("dyspnoea_at_rest")->nullable();
            $table->string("orthopnea")->nullable();
            $table->string("pnd")->nullable();
            $table->string("peripheral_oedema")->nullable();
            $table->string("pulmonary_rales")->nullable();
            $table->string("jvp")->nullable();
            $table->string("type_of_acute_HF")->nullable();
            $table->string("nyha_class")->nullable();
            $table->string("cardiogenic_shock")->nullable();
            $table->string("respiratory_failure")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clinicalprofile');
    }
}
