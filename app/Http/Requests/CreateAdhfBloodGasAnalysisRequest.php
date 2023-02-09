<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdhfBloodGasAnalysisRequest extends FormRequest {

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
            'pH' => 'required', 
            'pco2' => 'required', 
            'hco3' => 'required', 
            'po2' => 'required', 
            'lactate' => 'required', 
            'be' => 'required', 
            
		];
	}
}
