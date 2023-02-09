<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChronicBloodLaboratoryTestRequest extends FormRequest {

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
            'hbA1C' => 'required', 
            'fastingBloodGlucose' => 'required', 
            'twoHoursPostPrandialBloodGlucose' => 'required', 
            'natrium' => 'required', 
            'kalium' => 'required', 
            'ureum' => 'required', 
            'bun' => 'required', 
            'serumCreatinine' => 'required', 
            'gfr' => 'required', 
            'nt_ProBnp' => 'required', 
            
		];
	}
}
