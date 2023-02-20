<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChronicEchocardiographyTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chronicechocardiography', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("ef")->nullable();
            $table->string("tapse")->nullable();
            $table->string("edv")->nullable();
            $table->string("esv")->nullable();
            $table->string("edd")->nullable();
            $table->string("esd")->nullable();
            $table->string("signMr")->nullable();
            $table->string("diastolicFunction")->nullable();
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
        Schema::drop('chronicechocardiography');
    }
}
