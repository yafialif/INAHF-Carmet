<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\MonthFollowUp;
use App\Patient;

class ExportAdhfController extends Controller
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
		// $menu = MonthFollowUp::get();
		if ($role_id <= 2) {
			$patient = DB::table('patient')
				->join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
				->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
				->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
				->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
				->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
				->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
				->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
				->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
				->rightJoin('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
				// ->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id') Hapus
				->where('patient.categorytreatment_id', 1)
				->paginate(200);
		} else {
			$patient = DB::table('patient')
				->join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
				->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
				->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
				->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
				->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
				->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
				->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
				// ->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id') Hapus
				->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
				->rightJoin('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
				->where('patient.user_id', $user_id)
				->where('patient.categorytreatment_id', 1)
				->paginate(200);
		}

		// return response()->json($patient);
		return view('admin.exportadhf.index', compact('patient'));
		// return view('admin.exportadhf.index2');
	}

	public function data2()
	{
		$user_id = Auth::user()->id;
		$role_id = Auth::user()->role_id;
		// $menu = MonthFollowUp::get();
		if ($role_id <= 2) {
			// $patient = Patient::join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
			// 	->join('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
			// 	->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
			// 	->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
			// 	->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
			// 	->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
			// 	->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
			// 	->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
			// 	->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
			// 	->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id')
			// 	->where('patient.categorytreatment_id', 1)
			// 	->paginate(200);

			$patient = Patient::RightJoin('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
				->join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
				->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
				->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
				->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
				->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
				->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
				->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
				->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
				->where('patient.categorytreatment_id', 1)
				->paginate(200);
			// $patient_count = DB::table('patient')->where('patient.categorytreatment_id', 1)

		} else {
			$patient = DB::table('patient')
				->join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
				->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
				->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
				->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
				->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
				->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
				->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
				// ->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id') Hapus
				->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
				// ->rightJoin('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
				->where('patient.user_id', $user_id)
				->where('patient.categorytreatment_id', 1)
				->get();
		}


		// return response()->json($patient2);
		return view('admin.exportadhf.index', compact('patient'));
		// return view('admin.exportadhf.index2');
	}
}
