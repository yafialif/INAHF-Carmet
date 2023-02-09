<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class ChronicClinicalProfile extends Model {

    

    

    protected $table    = 'chronicclinicalprofile';
    
    protected $fillable = [
          'patient_id',
          'categorytreatment_id',
          'height',
          'weight',
          'bmi',
          'sbp',
          'dbp',
          'hr',
          'dyspnoeaOnExertion',
          'orthopnea',
          'pnd',
          'peripheralOedema',
          'pulmonaryRales',
          'jvp',
          'ahaStaging',
          'nyhaClass',
          'etiology'
    ];
    

    public static function boot()
    {
        parent::boot();

        ChronicClinicalProfile::observe(new UserActionsObserver);
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