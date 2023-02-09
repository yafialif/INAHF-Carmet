<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdhfMedicationRequest extends FormRequest {

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
            'DopaminDose' => 'required', 
            'DopaminDuration' => 'required', 
            'DobutaminDose' => 'required', 
            'DobutaminDuration' => 'required', 
            'NorepinephrineDose' => 'required', 
            'NorepinephrineDuration' => 'required', 
            'EpinephrinDose' => 'required', 
            'EpinephrinDuration' => 'required', 
            'acei' => 'required', 
            'aceiDoseatAdmission' => 'required', 
            'aceiDoseatPredischarge' => 'required', 
            'arb' => 'required', 
            'arbDoseatAdmission' => 'required', 
            'arbDoseatPredischarge' => 'required', 
            'arniDoseatAdmission' => 'required', 
            'arniDoseatPredischarge' => 'required', 
            'mraDoseatAdmission' => 'required', 
            'mraDoseatPredischarge' => 'required', 
            'BetaBlocker' => 'required', 
            'BetaBlockerDoseatAdmission' => 'required', 
            'BetaBlockerDoseatPredischarge' => 'required', 
            'LoopDiureticDoseatAdmission' => 'required', 
            'LoopDiureticDoseatPredischarge' => 'required', 
            'sglt2i' => 'required', 
            'sglt2iDoseatAdmission' => 'required', 
            'sglt2iDoseatPredischarge' => 'required', 
            'ivabradineDoseatAdmission' => 'required', 
            'ivabradineDoseatPredischarge' => 'required', 
            'TolvaptanTotalDose' => 'required', 
            'insulin' => 'required', 
            'insulinDose' => 'required', 
            'otherOAD' => 'required', 
            
		];
	}
}
