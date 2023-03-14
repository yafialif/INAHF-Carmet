<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdhf extends FormRequest
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
            'nik' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'dateOfAdmission' => 'required',
            'dateOfBirth' => 'required',
            'dateOfDischarge' => 'required',
            'inhospitalDeath' => 'required',
            'vulnerablePhaseDeath' => 'required',
            // clinical Profile
            'height' => 'required',
            'weight' => 'required',
            'bmi' => 'required',
            'sbp' => 'required',
            'dbp' => 'required',
            'hr' => 'required',
            'dyspnoea_at_rest' => 'required',
            'orthopnea' => 'required',
            'pnd' => 'required',
            'peripheral_oedema' => 'required',
            'pulmonary_rales' => 'required',
            'jvp' => 'required',
            'type_of_acute_HF' => 'required',
            'nyha_class' => 'required',
            'cardiogenic_shock' => 'required',
            'respiratory_failure' => 'required',
            // risk Factor
            'hypertension' => 'required',
            'diabetes_or_prediabetes' => 'required',
            'dislipidemia' => 'required',
            'alcohol' => 'required',
            'smoker' => 'required',
            'ckd' => 'required',
            'valvular_heart_disease' => 'required',
            'atrial_fibrillation' => 'required',
            'history_of_hf' => 'required',
            'history_of_pci_or_cabg' => 'required',
            'historyof_heart_valve_surgery' => 'required',
            'omi_or_cad' => 'required',
            // Echo Cardiography
            'ef' => 'required',
            'tapse' => 'required',
            'random_blood_glucose' => 'required',
            // Blood Laboratory Test
            'hemoglobin' => 'required',
            'hematocrite' => 'required',
            'kalium' => 'required',
            'ureum' => 'required',
            'serum_creatinine' => 'required',


        ];
    }
}
