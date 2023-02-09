<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClinicalProfileRequest extends FormRequest {

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
            'user_id' => 'required', 
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
            
		];
	}
}
