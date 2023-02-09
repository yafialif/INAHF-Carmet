<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class AdhfBloodGasAnalysis extends Model {

    

    

    protected $table    = 'adhfbloodgasanalysis';
    
    protected $fillable = [
          'patient_id',
          'categorytreatment_id',
          'pH',
          'pco2',
          'hco3',
          'po2',
          'lactate',
          'be'
    ];
    

    public static function boot()
    {
        parent::boot();

        AdhfBloodGasAnalysis::observe(new UserActionsObserver);
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