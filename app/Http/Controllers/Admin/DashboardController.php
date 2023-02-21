<?php

namespace App\Http\Controllers\Admin;

use App\ChronicPatientMonthFollowUp;
use App\Http\Controllers\Controller;
use App\Patient;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

	/**
	 * Index page
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.dashboard.index');
	}
	public function chartAdhf()
	{
		$datagender = Patient::selectRaw('gender, count(*) AS total')
			->where('categorytreatment_id', 1)
			->groupBy('gender')
			->get();

		$datars = Patient::selectRaw('rumahsakit.name_of_rs,count(*) AS total')
			->join('rumahsakit', 'patient.rs_id', '=', 'rumahsakit.id')
			// ->where('patient.categorytreatment_id', 1)
			->groupBy('rumahsakit.name_of_rs')
			->get();

		$data = array($datagender, $datars);
		return response()->json($data);
	}
	public function notifMonthFollowUp()
	{
		// $user_id = Auth::user()->id;
		$patient = Patient::select('user_id')
			->where('user_id', '=', 5)
			->get();
		$MonthFollowUp = ChronicPatientMonthFollowUp::join('patient', 'patient.id', '=', 'chronicpatientmonthfollowup.patient_id')
			->select('patient.name', 'patient.dateOfAdmission', 'chronicpatientmonthfollowup.created_at As MonthFollowUpDate')
			->where('patient.user_id', '=', 5)
			->get();
		// if()
		return response()->json($MonthFollowUp);
	}
}
