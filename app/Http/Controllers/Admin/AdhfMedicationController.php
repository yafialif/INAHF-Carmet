<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdhfMedication;
use App\Http\Requests\CreateAdhfMedicationRequest;
use App\Http\Requests\UpdateAdhfMedicationRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class AdhfMedicationController extends Controller {

	/**
	 * Display a listing of adhfmedication
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $adhfmedication = AdhfMedication::with("patient")->with("categorytreatment")->get();

		return view('admin.adhfmedication.index', compact('adhfmedication'));
	}

	/**
	 * Show the form for creating a new adhfmedication
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.adhfmedication.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created adhfmedication in storage.
	 *
     * @param CreateAdhfMedicationRequest|Request $request
	 */
	public function store(CreateAdhfMedicationRequest $request)
	{
	    
		AdhfMedication::create($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfmedication.index');
	}

	/**
	 * Show the form for editing the specified adhfmedication.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhfmedication = AdhfMedication::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.adhfmedication.edit', compact('adhfmedication', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified adhfmedication in storage.
     * @param UpdateAdhfMedicationRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdhfMedicationRequest $request)
	{
		$adhfmedication = AdhfMedication::findOrFail($id);

        

		$adhfmedication->update($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfmedication.index');
	}

	/**
	 * Remove the specified adhfmedication from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdhfMedication::destroy($id);

		return redirect()->route(config('quickadmin.route').'.adhfmedication.index');
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
            AdhfMedication::destroy($toDelete);
        } else {
            AdhfMedication::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.adhfmedication.index');
    }

}
