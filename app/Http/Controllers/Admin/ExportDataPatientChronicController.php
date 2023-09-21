<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\MonthFollowUp;

class ExportDataPatientChronicController extends Controller
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
		$user_id = Auth::user()->id;
		$role_id = Auth::user()->role_id;
		$menu = MonthFollowUp::get();
		// if ($role_id >= 2) {
		// $patient = DB::table('patient')
		// ->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
		// ->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
		// ->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
		// ->join('chronicoutcomes', 'patient.id', '=', 'chronicoutcomes.patient_id')
		// ->join('chronicrothorax', 'patient.id', '=', 'chronicrothorax.patient_id')
		// ->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
		// ->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
		// ->where('patient.categorytreatment_id', 2)
		// ->get();
		// } else {
		// 	$patient = DB::table('patient')
		// 		->join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
		// 		->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
		// 		->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
		// 		->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
		// 		->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
		// 		->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
		// 		->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
		// 		->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id')
		// 		->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
		// 		->join('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
		// 		->where('patient.user_id', $user_id)
		// 		->where('patient.categorytreatment_id', 1)
		// 		->get();
		// }
		// return response()->json($patient);
		if ($role_id <= 2) {

			$patient = DB::table('patient')
				->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
				->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
				->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
				->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
				->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
				->where('patient.categorytreatment_id', 2)
				->get();
		} else {
			$patient = DB::table('patient')
				->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
				->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
				->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
				->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
				->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
				->where('patient.user_id', $user_id)
				->where('patient.categorytreatment_id', 2)
				->get();
		}

		// $data = $patient[0];
		return view('admin.exportdatapatientchronic.index', compact('patient'));
	}
}
