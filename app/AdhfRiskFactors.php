<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class AdhfRiskFactors extends Model {

    

    

    protected $table    = 'adhfriskfactors';
    
    protected $fillable = [
          'patient_id',
          'categorytreatment_id',
          'hypertension',
          'diabetes_or_prediabetes',
          'dislipidemia',
          'alcohol',
          'smoker',
          'ckd',
          'valvular_heart_disease',
          'atrial_fibrillation',
          'history_of_hf',
          'history_of_pci_or_cabg',
          'historyof_heart_valve_surgery',
          'omi_or_cad'
    ];
    

    public static function boot()
    {
        parent::boot();

        AdhfRiskFactors::observe(new UserActionsObserver);
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