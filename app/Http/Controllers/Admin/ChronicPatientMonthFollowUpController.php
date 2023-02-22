<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ChronicPatientMonthFollowUp;
use App\Http\Requests\CreateChronicPatientMonthFollowUpRequest;
use App\Http\Requests\UpdateChronicPatientMonthFollowUpRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;
use App\MonthFollowUp;
use Illuminate\Support\Facades\Auth;


class ChronicPatientMonthFollowUpController extends Controller
{

	/**
	 * Display a listing of chronicpatientmonthfollowup
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\View\View
	 */
	public function index(Request $request)
	{
		// $user_id = 5;
		$user_id = Auth::user()->id;
		$role_id = Auth::user()->role_id;
		if ($role_id <= 2) {
			$chronicpatientmonthfollowup = ChronicPatientMonthFollowUp::join('patient', 'patient.id', '=', 'chronicpatientmonthfollowup.patient_id')
				->join('monthfollowup', 'monthfollowup.id', '=', 'chronicpatientmonthfollowup.monthfollowup_id')
				// ->where('patient.user_id', '=', $user_id)
				->get();
		} else {
			$chronicpatientmonthfollowup = ChronicPatientMonthFollowUp::join('patient', 'patient.id', '=', 'chronicpatientmonthfollowup.patient_id')
				->join('monthfollowup', 'monthfollowup.id', '=', 'chronicpatientmonthfollowup.monthfollowup_id')
				->where('patient.user_id', '=', $user_id)
				->get();
		}
		// return response()->json($chronicpatientmonthfollowup);
		return view('admin.chronicpatientmonthfollowup.index', compact('chronicpatientmonthfollowup'));
	}

	/**
	 * Show the form for creating a new chronicpatientmonthfollowup
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$patient = Patient::pluck("name", "id")->prepend('Please select', 0);
		$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);
		$monthfollowup = MonthFollowUp::pluck("mount", "id")->prepend('Please select', 0);
		return view('admin.chronicpatientmonthfollowup.create', compact("patient", "categorytreatment", "monthfollowup"));
	}

	public function addnew($id)
	{
		$patient = Patient::where('id', $id)->pluck("name", "id");
		$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);
		$monthfollowup = MonthFollowUp::pluck("mount", "id")->prepend('Please select', 0);
		// $monthfollowup2 = MonthFollowUp::select("mount", "id AS monthfollowup_id")->get();
		// $monthfollowupdata = ChronicPatientMonthFollowUp::select('monthfollowup_id')->where('patient_id', $id)->get();
		// $monthfollowupdata = ChronicPatientMonthFollowUp::select('monthfollowup_id')
		// 	->join('monthfollowup', 'monthfollowup_id', '=', 'monthfollowup.id')
		// 	->where('patient_id', $id)->get();
		// $result = array_diff_assoc($monthfollowup, $monthfollowupdata);



		return view('admin.chronicpatientmonthfollowup.create', compact("patient", "monthfollowup",));
		// return response()->json($monthfollowupdata);
	}

	/**
	 * Store a newly created chronicpatientmonthfollowup in storage.
	 *
	 * @param CreateChronicPatientMonthFollowUpRequest|Request $request
	 */
	public function store(Request $request)
	{

		// ChronicPatientMonthFollowUp::create($request->all());
		$ChronicPatientMonthFollowUp = new ChronicPatientMonthFollowUp();
		$ChronicPatientMonthFollowUp->patient_id = $request->patient_id;
		$ChronicPatientMonthFollowUp->categorytreatment_id = 2;
		$ChronicPatientMonthFollowUp->monthfollowup_id = $request->monthfollowup_id;
		$ChronicPatientMonthFollowUp->peripheralOedema = $request->peripheralOedema;
		$ChronicPatientMonthFollowUp->nyhaClass = $request->nyhaClass;
		$ChronicPatientMonthFollowUp->sbp = $request->sbp;
		$ChronicPatientMonthFollowUp->dbp = $request->dbp;
		$ChronicPatientMonthFollowUp->hr = $request->hr;
		$ChronicPatientMonthFollowUp->echoEf = $request->echoEf;
		$ChronicPatientMonthFollowUp->echoTapse = $request->echoTapse;
		$ChronicPatientMonthFollowUp->echoEdv = $request->echoEdv;
		$ChronicPatientMonthFollowUp->echoEsv = $request->echoEsv;
		$ChronicPatientMonthFollowUp->echoEsd = $request->echoEsd;
		$ChronicPatientMonthFollowUp->echoSignMr = $request->echoSignMr;
		$ChronicPatientMonthFollowUp->echoDiastolicFunction = $request->echoDiastolicFunction;
		$ChronicPatientMonthFollowUp->acei = $request->acei;
		$ChronicPatientMonthFollowUp->aceiDose = $request->aceiDose;
		$ChronicPatientMonthFollowUp->aceiIntolerance = $request->aceiIntolerance;
		$ChronicPatientMonthFollowUp->arb = $request->arb;
		$ChronicPatientMonthFollowUp->arbDose = $request->arbDose;
		$ChronicPatientMonthFollowUp->arniDose = $request->arniDose;
		$ChronicPatientMonthFollowUp->betaBlocker = $request->betaBlocker;
		$ChronicPatientMonthFollowUp->betaBlockerDose = $request->betaBlockerDose;
		$ChronicPatientMonthFollowUp->betaBlockerIntolerance = $request->betaBlockerIntolerance;
		$ChronicPatientMonthFollowUp->mraDose = $request->mraDose;
		$ChronicPatientMonthFollowUp->mraIntolerance = $request->mraIntolerance;
		$ChronicPatientMonthFollowUp->sglt2i = $request->sglt2i;
		$ChronicPatientMonthFollowUp->sglt2iDose = $request->sglt2iDose;
		$ChronicPatientMonthFollowUp->loopDiureticDose = $request->loopDiureticDose;
		$ChronicPatientMonthFollowUp->ivabradineDose = $request->ivabradineDose;
		$ChronicPatientMonthFollowUp->insulin = $request->insulin;
		$ChronicPatientMonthFollowUp->save();

		// return response()->json($request);
		return redirect()->route('admin.listpatientcronic.index');

		// return redirect()->route(config('quickadmin.route') . '.chronicpatientmonthfollowup.index');
	}

	/**
	 * Show the form for editing the specified chronicpatientmonthfollowup.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$chronicpatientmonthfollowup = ChronicPatientMonthFollowUp::find($id);
		$patient = Patient::pluck("name", "id")->prepend('Please select', 0);
		$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);
		$monthfollowup = MonthFollowUp::pluck("mount", "id")->prepend('Please select', 0);

		return view('admin.chronicpatientmonthfollowup.edit', compact('chronicpatientmonthfollowup', "patient", "categorytreatment", "monthfollowup"));
	}

	/**
	 * Update the specified chronicpatientmonthfollowup in storage.
	 * @param UpdateChronicPatientMonthFollowUpRequest|Request $request
	 *
	 * @param  int  $id
	 */
	public function update($id, Request $request)
	{
		$chronicpatientmonthfollowup = ChronicPatientMonthFollowUp::findOrFail($id);

		$chronicpatientmonthfollowup->update($request->all());
		// return view('admin.listpatientcronic.index', compact('patient', 'monthfollowupdata'));

		return redirect()->route(config('quickadmin.route') . '.listpatientcronic.index');
	}

	/**
	 * Remove the specified chronicpatientmonthfollowup from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ChronicPatientMonthFollowUp::destroy($id);

		return redirect()->route(config('quickadmin.route') . '.chronicpatientmonthfollowup.index');
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
			ChronicPatientMonthFollowUp::destroy($toDelete);
		} else {
			ChronicPatientMonthFollowUp::whereNotNull('id')->delete();
		}

		return redirect()->route(config('quickadmin.route') . '.chronicpatientmonthfollowup.index');
	}
}
