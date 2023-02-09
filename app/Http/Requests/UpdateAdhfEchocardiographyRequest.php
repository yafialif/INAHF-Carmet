<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdhfEchocardiographyRequest extends FormRequest {

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
            'ef' => 'required', 
            'tapse' => 'required', 
            'edv' => 'required', 
            'esv' => 'required', 
            'esd' => 'required', 
            'sign_mr' => 'required', 
            'diastolic_function' => 'required', 
            
		];
	}
}
