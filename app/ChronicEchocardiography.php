<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class ChronicEchocardiography extends Model {

    

    

    protected $table    = 'chronicechocardiography';
    
    protected $fillable = [
          'patient_id',
          'categorytreatment_id',
          'ef',
          'tapse',
          'edv',
          'esv',
          'edd',
          'esd',
          'signMr',
          'diastolicFunction'
    ];
    

    public static function boot()
    {
        parent::boot();

        ChronicEchocardiography::observe(new UserActionsObserver);
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