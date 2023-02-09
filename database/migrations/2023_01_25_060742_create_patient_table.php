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
            $table->string("nik");
            $table->string("name");
            $table->date("dateOfBirth");
            $table->string("age");
            $table->string("gender");
            $table->string("phone");
            $table->date("dateOfAdmission");
            $table->string("insurance");
            $table->string("education");
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
