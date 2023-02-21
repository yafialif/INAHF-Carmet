<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Patient;

class ChartadhfController extends Controller
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
		$datagender = Patient::selectRaw('gender, count(*) AS total')
			->where('categorytreatment_id', 1)
			->groupBy('gender')
			->get();

		$datars = Patient::selectRaw('rumahsakit.name_of_rs,count(*) AS total')
			->join('rumahsakit', 'patient.rs_id', '=', 'rumahsakit.id')
			->where('patient.categorytreatment_id', 1)
			->groupBy('rumahsakit.name_of_rs')
			->get();

		$dataAge = Patient::selectRaw('age')
			->where('patient.categorytreatment_id', 1)
			->get();
		$dataInsurance = Patient::selectRaw('insurance , count(*) AS total')
			->where('patient.categorytreatment_id', 1)
			->groupBy('insurance')
			->get();
		$dataEducation = Patient::selectRaw('education, count(*) AS total')
			->where('patient.categorytreatment_id', 1)
			->groupBy('education')
			->get();

		$data = array($datagender, $datars, $dataAge, $dataInsurance, $dataEducation);
		return view('admin.chartadhf.index', compact('data'));
	}

	public function chartAdhf()
	{
		$datagender = Patient::selectRaw('gender, count(*) AS total')
			->where('categorytreatment_id', 1)
			->groupBy('gender')
			->get();

		$datars = Patient::selectRaw('rumahsakit.name_of_rs,count(*) AS total')
			->join('rumahsakit', 'patient.rs_id', '=', 'rumahsakit.id')
			->where('patient.categorytreatment_id', 1)
			->groupBy('rumahsakit.name_of_rs')
			->get();

		$dataAge = Patient::selectRaw('age')
			->where('patient.categorytreatment_id', 1)
			->get();
		$dataInsurance = Patient::selectRaw('insurance , count(*) AS total')
			->where('patient.categorytreatment_id', 1)
			->groupBy('insurance')
			->get();
		$dataEducation = Patient::selectRaw('education, count(*) AS total')
			->where('patient.categorytreatment_id', 1)
			->groupBy('education')
			->get();

		$data = array($datagender, $datars, $dataAge, $dataInsurance, $dataEducation);
		return response()->json($data);
	}
}
