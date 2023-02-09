<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class AdhfRoThorax extends Model {

    

    

    protected $table    = 'adhfrothorax';
    
    protected $fillable = [
          'patient_id',
          'categorytreatment_id',
          'ro_thorax'
    ];
    

    public static function boot()
    {
        parent::boot();

        AdhfRoThorax::observe(new UserActionsObserver);
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