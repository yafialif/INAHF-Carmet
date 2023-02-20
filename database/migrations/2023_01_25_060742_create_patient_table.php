<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreatePatientTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('patient', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->references("id")->on("user");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->integer("rs_id")->references("id")->on("rumahsakit");
            $table->string("nik")->nullable();
            $table->string("name")->nullable();
            $table->date("dateOfBirth")->nullable();
            $table->string("age")->nullable();
            $table->string("gender")->nullable();
            $table->string("phone")->nullable();
            $table->date("dateOfAdmission")->nullable();
            $table->string("insurance")->nullable();
            $table->string("education")->nullable();
            $table->date("dateOfDischarge")->nullable();
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
        Schema::drop('patient');
    }
}
