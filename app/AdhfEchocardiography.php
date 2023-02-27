<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class AdhfEchocardiography extends Model
{

    protected $table    = 'adhfechocardiography';

    protected $fillable = [
        'patient_id',
        'categorytreatment_id',
        'ef',
        'tapse',
        'edv',
        'esv',
        'edd',
        'esd',
        'sign_mr',
        'diastolic_function'
    ];


    public static function boot()
    {
        parent::boot();

        AdhfEchocardiography::observe(new UserActionsObserver);
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
