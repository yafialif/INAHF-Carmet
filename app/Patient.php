<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon;



class Patient extends Model
{





    protected $table    = 'patient';

    protected $fillable = [
        'user_id',
        'categorytreatment_id',
        'rs_id',
        'nik',
        'name',
        'dateOfBirth',
        'age',
        'gender',
        'phone',
        'dateOfAdmission',
        'insurance',
        'education',
        'dateOfDischarge'
    ];


    public static function boot()
    {
        parent::boot();

        Patient::observe(new UserActionsObserver);
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function treatment()
    {
        return $this->hasOne('App\CategoryTreatment', 'id', 'categorytreatment_id');
    }



    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateOfBirthAttribute($input)
    {
        if ($input != '') {
            $this->attributes['dateOfBirth'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['dateOfBirth'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateOfBirthAttribute($input)
    {
        if ($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateOfAdmissionAttribute($input)
    {
        if ($input != '') {
            $this->attributes['dateOfAdmission'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['dateOfAdmission'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateOfAdmissionAttribute($input)
    {
        if ($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateOfDischargeAttribute($input)
    {
        if ($input != '') {
            $this->attributes['dateOfDischarge'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['dateOfDischarge'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateOfDischargeAttribute($input)
    {
        if ($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        } else {
            return '';
        }
    }
}
