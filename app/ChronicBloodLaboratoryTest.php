<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class ChronicBloodLaboratoryTest extends Model {

    

    

    protected $table    = 'chronicbloodlaboratorytest';
    
    protected $fillable = [
          'patient_id',
          'categorytreatment_id',
          'hemoglobin',
          'hematocrite',
          'erythrocyte',
          'hbA1C',
          'fastingBloodGlucose',
          'twoHoursPostPrandialBloodGlucose',
          'natrium',
          'kalium',
          'ureum',
          'bun',
          'serumCreatinine',
          'gfr',
          'nt_ProBnp'
    ];
    

    public static function boot()
    {
        parent::boot();

        ChronicBloodLaboratoryTest::observe(new UserActionsObserver);
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