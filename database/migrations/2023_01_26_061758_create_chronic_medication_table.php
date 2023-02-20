<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateChronicMedicationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('chronicmedication', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("patient_id")->references("id")->on("patient");
            $table->integer("categorytreatment_id")->references("id")->on("categorytreatment");
            $table->string("acei")->nullable();
            $table->string("aceiDose")->nullable();
            $table->string("aceiIntolerance")->nullable();
            $table->string("arb")->nullable();
            $table->string("arbDose")->nullable();
            $table->string("arniDose")->nullable();
            $table->string("betaBlocker")->nullable();
            $table->string("betaBlockerDose")->nullable();
            $table->string("betaBlockerIntolerance")->nullable();
            $table->string("mraDose")->nullable();
            $table->string("mraIntolerance")->nullable();
            $table->string("sglt2i")->nullable();
            $table->string("sglt2iDose")->nullable();
            $table->string("loopDiuretic")->nullable();
            $table->string("loopDiureticDose")->nullable();
            $table->string("ivabradineDose")->nullable();
            $table->string("insulin")->nullable();
            $table->string("devices")->nullable();
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
        Schema::drop('chronicmedication');
    }
}
