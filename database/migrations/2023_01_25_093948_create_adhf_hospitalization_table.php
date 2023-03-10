<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAdhfHospitalizationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('adhfhospitalization', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("iccu")->nullable();
            $table->string("ward")->nullable();
            $table->string("totalLoS")->nullable();
            $table->string("hospitalizationCost")->nullable();
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
        Schema::drop('adhfhospitalization');
    }
}
