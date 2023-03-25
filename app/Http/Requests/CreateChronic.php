<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChronic extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Patient identity
            'nik' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'insurance' => 'required',
            'education' => 'required',
            'dateOfBirth' => 'required',
            'dateOfClinicVisit' => 'required',
            'yearOfAdmission' => 'required',
            'phone' => 'required',

            //Clinical Profile
            'height' => 'required',
            'weight' => 'required',
            'sbp' => 'required',
            'dbp' => 'required',
            'hr' => 'required',
            'bmi' => 'required',
            'dyspnoeaOnExertion' => 'required',
            'orthopnea' => 'required',
            'nyhaClass' => 'required',
            'etiology' => 'required',
            'pnd' => 'required',
            'peripheralOedema' => 'required',
            'pulmonaryRales' => 'required',

            // Risk Factor
            'smoker' => 'required',
            'diabetesorPrediabetes' => 'required',
            'hypertension' => 'required',
            'dislipidemia' => 'required',
            'alcohol' => 'required',
            'ckd' => 'required',
            'atrialFibrillation' => 'required',
            'bundleBranchBlock' => 'required',
            'historyofCad' => 'required',
            'historyofHf' => 'required',
            'historyofPciorCabg' => 'required',
            'valvularHeartDiesease' => 'required',

            // Echocardiography
            'efAtFirst' => 'required',
            'efAtFirstDate' => 'required',
            'latestEf' => 'required',
            'latestEfDate' => 'required',
            'tapse' => 'required',

            // Blood Laboratory Test
            'hemoglobin' => 'required',
            'randomBloodGlucose' => 'required',
            'kalium' => 'required',
            'ureum' => 'required',
            'serumCreatinine' => 'required',
            'gfr' => 'required',

        ];
    }
}
