<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAdhfEtiologyTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('adhfetiology', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("acs")->nullable();
            $table->string("hypertension_emergency")->nullable();
            $table->string("arrhytmia")->nullable();
            $table->string("acute_nechanical_cause")->nullable();
            $table->string("pulmonary_embolism")->nullable();
            $table->string("infections")->nullable();
            $table->string("tamponade")->nullable();
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
        Schema::drop('adhfetiology');
    }
}
