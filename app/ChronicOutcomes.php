<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon;



class ChronicOutcomes extends Model
{





    protected $table    = 'chronicoutcomes';

    protected $fillable = [
        'patient_id',
        'categorytreatment_id',
        'totalRehospitalization',
        'allCauseDeath',
        'cardiacRelatedDeath',
        'dateofDeath',
        'additional_notes',
    ];


    public static function boot()
    {
        parent::boot();

        ChronicOutcomes::observe(new UserActionsObserver);
    }

    public function patient()
    {
        return $this->hasOne('App\Patient', 'id', 'patient_id');
    }


    public function categorytreatment()
    {
        return $this->hasOne('App\CategoryTreatment', 'id', 'categorytreatment_id');
    }



    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateofDeathAttribute($input)
    {
        if ($input != '') {
            $this->attributes['dateofDeath'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['dateofDeath'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateofDeathAttribute($input)
    {
        if ($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        } else {
            return '';
        }
    }
}
