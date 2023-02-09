<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdhfEtiologyRequest extends FormRequest {

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
            'acs' => 'required', 
            'hypertension_emergency' => 'required', 
            'arrhytmia' => 'required', 
            'acute_nechanical_cause' => 'required', 
            'pulmonary_embolism' => 'required', 
            'infections' => 'required', 
            'tamponade' => 'required', 
            
		];
	}
}
