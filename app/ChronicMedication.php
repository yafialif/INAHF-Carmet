<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class ChronicMedication extends Model
{





    protected $table    = 'chronicmedication';

    protected $fillable = [
        'patient_id',
        'categorytreatment_id',
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
        'statin',
        'insulin',
        'devices',
        'additional_notes'
    ];


    public static function boot()
    {
        parent::boot();

        ChronicMedication::observe(new UserActionsObserver);
    }

    public function patient()
    {
        return $this->hasOne('App\Patient', 'id', 'patient_id');
    }


    public function categorytreatment()
    {
        return $this->hasOne('App\CategoryTreatment', 'id', 'categorytreatment_id');
    }
}
