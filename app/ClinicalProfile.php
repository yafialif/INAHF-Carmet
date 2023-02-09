<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class ClinicalProfile extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'clinicalprofile';
    
    protected $fillable = [
          'user_id',
          'categorytreatment_id',
          'height',
          'weight',
          'bmi',
          'sbp',
          'dbp',
          'hr',
          'dyspnoea_at_rest',
          'orthopnea',
          'pnd',
          'peripheral_oedema',
          'pulmonary_rales',
          'jvp',
          'type_of_acute_HF',
          'nyha_class',
          'cardiogenic_shock',
          'respiratory_failure'
    ];
    

    public static function boot()
    {
        parent::boot();

        ClinicalProfile::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    public function categorytreatment()
    {
        return $this->hasOne('App\CategoryTreatment', 'id', 'categorytreatment_id');
    }


    
    
    
}