<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdhfRiskFactorsRequest extends FormRequest {

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
            'patient_id' => 'required', 
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
            
		];
	}
}
