<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdhf extends FormRequest
{
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
            'nik' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'dateadmission' => 'required',
            'datebirth' => 'required',
            'dateOfDischarge' => 'required',
            'inhospitalDeath' => 'required',
            'vulnerablePhaseDeath' => 'required',
            'vulnerablePhaseRehospitalization' => 'required',
        ];
    }
}
