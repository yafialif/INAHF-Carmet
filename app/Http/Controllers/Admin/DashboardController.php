<?php

namespace App\Http\Controllers\Admin;

use App\ChronicPatientMonthFollowUp;
use App\Http\Controllers\Controller;
use App\Patient;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

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
		$datenow =  date("Y-m-d H:i:s");

		$MonthFollowUp = ChronicPatientMonthFollowUp::join('patient', 'patient.id', '=', 'chronicpatientmonthfollowup.patient_id')
			->select('chronicpatientmonthfollowup.id', 'chronicpatientmonthfollowup.monthfollowup_id', 'patient.name', 'patient.dateOfAdmission', 'chronicpatientmonthfollowup.created_at As MonthFollowUpDate')
			->where('patient.user_id', '=', 6)
			->orderBy('chronicpatientmonthfollowup.id', 'desc')
			->get();
		if ($MonthFollowUp[0]) {
			// $result = strtotime($MonthFollowUp[0]->MonthFollowUpDate);
			$date1 = new DateTime($MonthFollowUp[0]->MonthFollowUpDate);
			$date2 = new DateTime($datenow);

			$interval = $date1->diff($date2);
			$jumlahBulan = ($interval->y * 12) + $interval->m;
			if ($jumlahBulan >= 6) {
				$swal = true;
			} else {
				$swal = false;
			}
		} else {
			$patient = Patient::select('user_id', 'name', 'dateOfAdmission')
				->where('user_id', '=', 6)
				->where('categorytreatment_id', '=', 2)
				->get();
			$date1 = new DateTime($patient[0]->dateOfAdmission);
			$date2 = new DateTime($datenow);

			$interval = $date1->diff($date2);
			$jumlahBulan = ($interval->y * 12) + $interval->m;
			if ($jumlahBulan >= 6) {
				$swal = true;
			} else {
				$swal = false;
			}
		}
		return response()->json($swal);
	}
}
