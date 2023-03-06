<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class AdhfMedication extends Model
{





    protected $table    = 'adhfmedication';

    protected $fillable = [
        'patient_id',
        'categorytreatment_id',
        //   'DopaminDose',
        //   'DopaminDuration',
        //   'DobutaminDose',
        //   'DobutaminDuration',
        //   'NorepinephrineDose',
        //   'NorepinephrineDuration',
        //   'EpinephrinDose',
        //   'EpinephrinDuration',
        'acei',
        //   'aceiDoseatAdmission',
        'aceiDoseatPredischarge',
        'arb',
        //   'arbDoseatAdmission',
        'arbDoseatPredischarge',
        //   'arniDoseatAdmission',
        'arniDoseatPredischarge',
        //   'mraDoseatAdmission',
        'mraDoseatPredischarge',
        'BetaBlocker',
        //   'BetaBlockerDoseatAdmission',
        'BetaBlockerDoseatPredischarge',
        //   'LoopDiureticDoseatAdmission',
        'LoopDiureticDoseatPredischarge',
        'sglt2i',
        //   'sglt2iDoseatAdmission',
        //   'sglt2iDoseatPredischarge',
        //   'ivabradineDoseatAdmission',
        'ivabradineDoseatPredischarge',
        //   'TolvaptanTotalDose',
        'Tolvaptan',
        // 'insulin',
        'insulinDose',
        'inotropic',
        'vasoconstrictor',
        'statin',
        // 'otherOAD'
    ];


    public static function boot()
    {
        parent::boot();

        AdhfMedication::observe(new UserActionsObserver);
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
