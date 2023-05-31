<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Patient;
use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CategoryTreatment;


use App\User;


class PatientController extends Controller
{

	/**
	 * Display a listing of patient
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\View\View
	 */
	public function index(Request $request)
	{

		$patient = Patient::with("user")->get();

		// $data = $patients->map(function ($patient) {
		// 	if (empty($patient->dateOfAdmission)) {
		// 		$patient->dateOfAdmission = '-';
		// 	} else {
		// 		$patient->dateOfAdmission = date('d-m-Y', strtotime($patient->dateOfAdmission));
		// 	}
		// 	if (empty($patient->dateOfDischarge)) {
		// 		$patient->dateOfDischarge = '-';
		// 	} else {
		// 		$patient->dateOfDischarge = date('d-m-Y', strtotime($patient->dateOfDischarge));
		// 	}
		// 	return $patient;
		// });
		// $jsonData = $data->toJson();
		// return response()->json($jsonData);
		return view('admin.patient.index', compact('patient'));

		// return json_encode($patient);
	}

	/**
	 * Show the form for creating a new patient
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		// $user = User::pluck("name", "id")->prepend('Please select', 0);
		$CategoryTreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);


		return view('admin.patient.create', compact("CategoryTreatment"));
	}

	/**
	 * Store a newly created patient in storage.
	 *
	 * @param CreatePatientRequest|Request $request
	 */
	public function store(CreatePatientRequest $request)
	{
		// Patient::create($request->all());
		$user_id = Auth::user()->id;

		$patient = new Patient();
		$patient->user_id = $user_id;
		$patient->categorytreatment_id = $request->categorytreatment_id;
		$patient->nik = $request->nik;
		$patient->name = $request->name;
		$patient->dateOfBirth = $request->dateOfBirth;
		$patient->age = $request->age;
		$patient->gender = $request->gender;
		$patient->phone = $request->phone;
		$patient->dateOfAdmission = $request->dateOfAdmission;
		$patient->insurance = $request->insurance;
		$patient->education = $request->education;
		if ($request->dateOfDischarge) {
			$patient->dateOfDischarge = $request->dateOfDischarge;
		} else {
			$patient->dateOfDischarge = "0000-00-00";
		}


		$patient->save();

		return redirect()->route(config('quickadmin.route') . '.patient.index');
	}

	/**
	 * Show the form for editing the specified patient.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$patient = Patient::find($id);
		$user = User::pluck("name", "id")->prepend('Please select', 0);


		return view('admin.patient.edit', compact('patient', "user"));
	}

	/**
	 * Update the specified patient in storage.
	 * @param UpdatePatientRequest|Request $request
	 *
	 * @param  int  $id
	 */
	public function update($id, UpdatePatientRequest $request)
	{
		$patient = Patient::findOrFail($id);



		$patient->update($request->all());

		return redirect()->route(config('quickadmin.route') . '.patient.index');
	}

	/**
	 * Remove the specified patient from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Patient::destroy($id);

		return redirect()->route(config('quickadmin.route') . '.patient.index');
	}

	/**
	 * Mass delete function from index page
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function massDelete(Request $request)
	{
		if ($request->get('toDelete') != 'mass') {
			$toDelete = json_decode($request->get('toDelete'));
			Patient::destroy($toDelete);
		} else {
			Patient::whereNotNull('id')->delete();
		}

		return redirect()->route(config('quickadmin.route') . '.patient.index');
	}
}
