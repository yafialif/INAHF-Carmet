<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientRequest extends FormRequest
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
			'dateOfBirth' => 'required',
			'age' => 'required',
			'gender' => 'required',
			'phone' => 'required',
			'dateOfAdmission' => 'required',
			'insurance' => 'required',
			'education' => 'required',

		];
	}
}
