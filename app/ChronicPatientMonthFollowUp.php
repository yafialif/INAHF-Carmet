<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class ChronicPatientMonthFollowUp extends Model
{





    protected $table    = 'chronicpatientmonthfollowup';

    protected $fillable = [
        'patient_id',
        'categorytreatment_id',
        'monthfollowup_id',
        'peripheralOedema',
        'nyhaClass',
        'sbp',
        'dbp',
        'hr',
        'echoEf',
        'echoTapse',
        'echoEdv',
        'echoEsv',
        'echoEdd',
        'echoEsd',
        'echoSignMr',
        'echoDiastolicFunction',
        'acei',
        'aceiDose',
        'aceiIntolerance',
        'arb',
        'arbDose',
        'arniDose',
        'betaBlocker',
        'betaBlockerDose',
        'betaBlockerIntolerance',
        'mraDose',
        'mraIntolerance',
        'sglt2i',
        'sglt2iDose',
        'loopDiureticDose',
        'ivabradineDose',
        'insulin'
    ];


    public static function boot()
    {
        parent::boot();

        ChronicPatientMonthFollowUp::observe(new UserActionsObserver);
    }

    public function patient()
    {
        return $this->hasOne('App\Patient', 'id', 'patient_id');
    }


    public function categorytreatment()
    {
        return $this->hasOne('App\CategoryTreatment', 'id', 'categorytreatment_id');
    }


    public function monthfollowup()
    {
        return $this->hasOne('App\MonthFollowUp', 'id', 'monthfollowup_id');
    }
}
