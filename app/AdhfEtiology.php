<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class AdhfEtiology extends Model
{





    protected $table    = 'adhfetiology';

    protected $fillable = [
        'patient_id',
        'categorytreatment_id',
        'precipitating_factors',

    ];


    public static function boot()
    {
        parent::boot();

        AdhfEtiology::observe(new UserActionsObserver);
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
