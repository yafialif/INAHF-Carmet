<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ChronicPatientMonthFollowUp;
use App\Patient;
use DateTime;
use App\User;
use Illuminate\Support\Facades\Auth;

class TimeFollowupPatientController extends Controller
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
		$datenow =  date("Y-m-d H:i:s");
		$id_user = Auth::user()->id;
		// $id_user = 6;
		$data_followup = array();
		$patient = Patient::select('id', 'user_id', 'name', 'dateOfAdmission')
			->where('user_id', '=', $id_user)
			->where('categorytreatment_id', '=', 2)
			->get();

		if (count($patient) == 0) {
			$swal =  array(
				'swal' => false,
				'message' => 'Pesan',
			);
		} else {
			foreach ($patient as $key) {
				$MonthFollowUp = ChronicPatientMonthFollowUp::join('patient', 'patient.id', '=', 'chronicpatientmonthfollowup.patient_id')
					->select('chronicpatientmonthfollowup.id', 'chronicpatientmonthfollowup.monthfollowup_id', 'monthfollowup.mount', 'patient.name', 'patient.dateOfAdmission', 'chronicpatientmonthfollowup.created_at As MonthFollowUpDate')
					->where('patient.user_id', '=', $key->user_id)
					->join('monthfollowup', 'monthfollowup.id', '=', 'chronicpatientmonthfollowup.monthfollowup_id')
					->orderBy('chronicpatientmonthfollowup.id', 'desc')
					->get();
				if ($MonthFollowUp[0]) {
					// $result = strtotime($MonthFollowUp[0]->MonthFollowUpDate);
					$date1 = new DateTime($MonthFollowUp[0]->MonthFollowUpDate);
					$date2 = new DateTime($datenow);
					$selisih = abs(strtotime($datenow) - strtotime($MonthFollowUp[0]->MonthFollowUpDate));
					$jumlahHari = floor($selisih / (60 * 60 * 24));
					// $interval = $date1->diff($date2);
					// $jumlahBulan = ($interval->y * 12) + $interval->m;
					if ($jumlahHari >= 130) {
						array_push($data_followup, [
							'id' => $key->id,
							'name' => $key->name,
							'month' => $jumlahHari . ' days of ' . $MonthFollowUp[0]->mount . ' elapsed, preparing for the next Follow-Up Period',
							'date' => $MonthFollowUp[0]->MonthFollowUpDate,
						]);
					}
				} else {

					$date1 = new DateTime($key->dateOfAdmission);
					$date2 = new DateTime($datenow);
					// $interval = $date1->diff($date2);
					// $jumlahBulan = ($interval->y * 12) + $interval->m;
					$selisih = abs(strtotime($datenow) - strtotime($key->dateOfAdmission));
					$jumlahHari = floor($selisih / (60 * 60 * 24));
					// $selisih = $date2->diff($date1);
					// $jumlahHari = intval($selisih->format("%m"));
					if ($jumlahHari >= 130) {
						array_push($data_followup, [
							'id' => $key->id,
							'name' => $key->name,
							'month' => $jumlahHari . ' days of New Patient to Followup' . ' elapsed, preparing for the next Follow-Up Period',
							'date' => $key->dateOfAdmission,
						]);
					}
				}
			}
		}
		// if (count($data_followup) >= 1) {
		// 	$swal = array(
		// 		'swal' => true,
		// 		'message' => 'Pasien atas nama ' . implode(", ", $data_followup) . ' sudah waktunya pemeriksaan berikutnya',
		// 	);
		// } else {
		// 	$swal = array(
		// 		'swal' => false,
		// 		'message' => '',
		// 	);
		// }
		$data = json_decode(json_encode($data_followup), false);
		// return response()->json($data_followup);
		// return view('admin.dashboard', compact('data'));
		return view('admin.timefollowuppatient.index', compact('data'));
	}
}
