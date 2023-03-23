<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class CronicRiskFactors extends Model
{





    protected $table    = 'cronicriskfactors';

    protected $fillable = [
        'patient_id',
        'categorytreatment_id',
        'hypertension',
        'diabetesorPrediabetes',
        'dislipidemia',
        'alcohol',
        'smoker',
        'ckd',
        // 'valvularHeartDisease',
        'atrialFibrillation',
        'bundleBranchBlock',
        'historyofCad',
        'historyofHf',
        'historyofPciorCabg'
    ];


    public static function boot()
    {
        parent::boot();

        CronicRiskFactors::observe(new UserActionsObserver);
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
