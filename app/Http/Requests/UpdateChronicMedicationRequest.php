<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChronicMedicationRequest extends FormRequest {

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
            'acei' => 'required', 
            'aceiDose' => 'required', 
            'aceiIntolerance' => 'required', 
            'arb' => 'required', 
            'arbDose' => 'required', 
            'arniDose' => 'required', 
            'betaBlocker' => 'required', 
            'betaBlockerDose' => 'required', 
            'betaBlockerIntolerance' => 'required', 
            'mraDose' => 'required', 
            'mraIntolerance' => 'required', 
            'sglt2i' => 'required', 
            'sglt2iDose' => 'required', 
            'loopDiuretic' => 'required', 
            'loopDiureticDose' => 'required', 
            'ivabradineDose' => 'required', 
            'insulin' => 'required', 
            'devices' => 'required', 
            
		];
	}
}
