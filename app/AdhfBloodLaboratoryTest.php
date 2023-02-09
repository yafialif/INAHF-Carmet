<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class AdhfBloodLaboratoryTest extends Model {

    

    

    protected $table    = 'adhfbloodlaboratorytest';
    
    protected $fillable = [
          'patient_id',
          'categorytreatment_id',
          'hemoglobin',
          'hematocrite',
          'erythrocyte',
          'random_blood_glucose',
          'fasting_blood_glucose',
          'twoHoursPostPrandialBloodGlucose',
          'natrium',
          'kalium',
          'ureum',
          'bun',
          'serum_creatinine',
          'gfr',
          'uric_acid',
          'NT_ProBNP_at_admission',
          'NT_ProBNP_at_discharge'
    ];
    

    public static function boot()
    {
        parent::boot();

        AdhfBloodLaboratoryTest::observe(new UserActionsObserver);
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