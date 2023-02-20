<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class AdhfHospitalization extends Model
{


    protected $table    = 'adhfhospitalization';

    protected $fillable = [
        'patient_id',
        'categorytreatment_id',
        'iccu',
        'ward',
        'totalLoS',
        'hospitalizationCost'
    ];


    public static function boot()
    {
        parent::boot();

        AdhfHospitalization::observe(new UserActionsObserver);
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
