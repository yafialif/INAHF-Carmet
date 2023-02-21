<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Patient;


class ChartchronicController extends Controller
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
			->where('categorytreatment_id', 2)
			->groupBy('gender')
			->get();

		$datars = Patient::selectRaw('rumahsakit.name_of_rs,count(*) AS total')
			->join('rumahsakit', 'patient.rs_id', '=', 'rumahsakit.id')
			->where('patient.categorytreatment_id', 2)
			->groupBy('rumahsakit.name_of_rs')
			->get();

		$dataAge = Patient::selectRaw('age')
			->where('patient.categorytreatment_id', 2)
			->get();
		$dataInsurance = Patient::selectRaw('insurance , count(*) AS total')
			->where('patient.categorytreatment_id', 2)
			->groupBy('insurance')
			->get();
		$dataEducation = Patient::selectRaw('education, count(*) AS total')
			->where('patient.categorytreatment_id', 2)
			->groupBy('education')
			->get();

		$data = array($datagender, $datars, $dataAge, $dataInsurance, $dataEducation);
		// return response()->json($data);
		return view('admin.chartchronic.index', compact('data'));
	}
}
