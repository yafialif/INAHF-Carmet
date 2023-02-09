<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class ChronicRoThorax extends Model {

    

    

    protected $table    = 'chronicrothorax';
    
    protected $fillable = [
          'patient_id',
          'categorytreatment_id',
          'roThorax'
    ];
    

    public static function boot()
    {
        parent::boot();

        ChronicRoThorax::observe(new UserActionsObserver);
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