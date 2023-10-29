<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\MonthFollowUp;

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
			$patient = DB::table('patient')
				// ->Join('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
				->join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
				->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
				->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
				->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
				->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
				->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
				->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
				->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
				// ->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id')
				->where('patient.categorytreatment_id', 1)
				->paginate(200);

			$patient2 = DB::table('patient')
				->Join('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
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

		$array1 = json_decode($patient, true);
		$array2 = json_decode($patient2, true);

		// Objek untuk menampung hasil gabungan
		$hasilGabungan = [];

		// Perulangan melalui $array1
		foreach ($array1 as $item1) {
			// Periksa apakah ada item dengan ID yang sama di $array2
			foreach ($array2 as $item2) {
				if ($item1['id'] === $item2['id']) {
					// Gabungkan item berdasarkan ID
					$gabungan = array_merge($item1, $item2);
					$hasilGabungan[] = $gabungan;
				}
			}
		}

		// Ubah hasil gabungan kembali ke JSON
		$jsonHasilGabungan = json_encode($hasilGabungan);

		return response()->json($patient);
		// return view('admin.exportadhf.coba', compact('patient', 'patient2'));
		// return view('admin.exportadhf.index2');
	}
}
