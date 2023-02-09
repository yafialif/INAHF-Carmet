<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChronicClinicalProfileRequest extends FormRequest {

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
            'height' => 'required', 
            'weight' => 'required', 
            'bmi' => 'required', 
            'sbp' => 'required', 
            'dbp' => 'required', 
            'hr' => 'required', 
            'dyspnoeaOnExertion' => 'required', 
            'orthopnea' => 'required', 
            'pnd' => 'required', 
            'peripheralOedema' => 'required', 
            'pulmonaryRales' => 'required', 
            'jvp' => 'required', 
            'ahaStaging' => 'required', 
            'nyhaClass' => 'required', 
            'etiology' => 'required', 
            
		];
	}
}
