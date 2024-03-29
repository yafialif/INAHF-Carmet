<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use App\AdhfBloodGasAnalysis;
use App\AdhfBloodLaboratoryTest;
use App\AdhfEchocardiography;
use App\AdhfEtiology;
use App\AdhfHospitalization;
use App\AdhfMedication;
use App\AdhfOutcomes;
use App\ClinicalProfile;

use App\ChronicClinicalProfile;
use App\CronicRiskFactors;
use App\ChronicRoThorax;
use App\ChronicEchocardiography;
use App\ChronicBloodLaboratoryTest;
use App\ChronicMedication;
use App\MonthFollowUp;
use App\ChronicOutcomes;
use App\ChronicPatientFollowup;

use Carbon\Carbon;



class Patient extends Model
{

    protected $table    = 'patient';

    protected $fillable = [
        'id',
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
        'dateOfDischarge',
        'yearOfAdmission',
        'dateOfClinicVisit',
        'percent',
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

    // Adhf

    public function adhfbloodlaboratorytest()
    {
        return $this->hasOne(adhfbloodlaboratorytest::class, 'patient_id');
    }
    public function adhfechocardiography()
    {
        return $this->hasOne(adhfechocardiography::class, 'patient_id');
    }
    public function adhfbloodgasanalysis()
    {
        return $this->hasOne(adhfbloodgasanalysis::class, 'patient_id');
    }
    public function adhfmedication()
    {
        return $this->hasOne(adhfmedication::class, 'patient_id');
    }
    public function adhfoutcomes()
    {
        return $this->hasOne(adhfoutcomes::class, 'patient_id');
    }
    public function adhfhospitalization()
    {
        return $this->hasOne(adhfhospitalization::class, 'patient_id');
    }
    public function adhfetiology()
    {
        return $this->hasOne(adhfetiology::class, 'patient_id');
    }

    public function clinicalprofile()
    {
        return $this->hasOne(clinicalprofile::class, 'user_id');
    }


    // Chronic
    public function chronicclinicalprofile()
    {
        return $this->hasOne(ChronicClinicalProfile::class, 'patient_id');
    }

    public function cronicriskfactors()
    {
        return $this->hasOne(CronicRiskFactors::class, 'patient_id');
    }
    public function chronicechocardiography()
    {
        return $this->hasOne(chronicechocardiography::class, 'patient_id');
    }
    public function chronicbloodlaboratorytest()
    {
        return $this->hasOne(chronicbloodlaboratorytest::class, 'patient_id');
    }
    public function chronicmedication()
    {
        return $this->hasOne(chronicmedication::class, 'patient_id');
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
