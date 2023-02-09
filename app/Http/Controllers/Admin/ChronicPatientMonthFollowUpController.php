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


class ChronicPatientMonthFollowUpController extends Controller {

	/**
	 * Display a listing of chronicpatientmonthfollowup
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $chronicpatientmonthfollowup = ChronicPatientMonthFollowUp::with("patient")->with("categorytreatment")->with("monthfollowup")->get();

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

	/**
	 * Store a newly created chronicpatientmonthfollowup in storage.
	 *
     * @param CreateChronicPatientMonthFollowUpRequest|Request $request
	 */
	public function store(CreateChronicPatientMonthFollowUpRequest $request)
	{
	    
		ChronicPatientMonthFollowUp::create($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicpatientmonthfollowup.index');
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
	public function update($id, UpdateChronicPatientMonthFollowUpRequest $request)
	{
		$chronicpatientmonthfollowup = ChronicPatientMonthFollowUp::findOrFail($id);

        

		$chronicpatientmonthfollowup->update($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicpatientmonthfollowup.index');
	}

	/**
	 * Remove the specified chronicpatientmonthfollowup from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ChronicPatientMonthFollowUp::destroy($id);

		return redirect()->route(config('quickadmin.route').'.chronicpatientmonthfollowup.index');
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

        return redirect()->route(config('quickadmin.route').'.chronicpatientmonthfollowup.index');
    }

}
