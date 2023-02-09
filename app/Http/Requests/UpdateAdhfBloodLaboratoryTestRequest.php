<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdhfBloodLaboratoryTestRequest extends FormRequest {

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
            'hemoglobin' => 'required', 
            'hematocrite' => 'required', 
            'erythrocyte' => 'required', 
            'random_blood_glucose' => 'required', 
            'fasting_blood_glucose' => 'required', 
            'twoHoursPostPrandialBloodGlucose' => 'required', 
            'natrium' => 'required', 
            'kalium' => 'required', 
            'ureum' => 'required', 
            'bun' => 'required', 
            'serum_creatinine' => 'required', 
            'gfr' => 'required', 
            'uric_acid' => 'required', 
            'NT_ProBNP_at_admission' => 'required', 
            'NT_ProBNP_at_discharge' => 'required', 
            
		];
	}
}
