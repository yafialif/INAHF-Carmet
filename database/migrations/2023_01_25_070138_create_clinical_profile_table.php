<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateClinicalProfileTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('clinicalprofile',function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id")->references("id")->on("user");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("height");
            $table->string("weight");
            $table->string("bmi");
            $table->string("sbp");
            $table->string("dbp");
            $table->string("hr");
            $table->string("dyspnoea_at_rest");
            $table->string("orthopnea");
            $table->string("pnd");
            $table->string("peripheral_oedema");
            $table->string("pulmonary_rales");
            $table->string("jvp");
            $table->string("type_of_acute_HF");
            $table->string("nyha_class");
            $table->string("cardiogenic_shock");
            $table->string("respiratory_failure");
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