<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ChronicMedication;
use App\Http\Requests\CreateChronicMedicationRequest;
use App\Http\Requests\UpdateChronicMedicationRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class ChronicMedicationController extends Controller {

	/**
	 * Display a listing of chronicmedication
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $chronicmedication = ChronicMedication::with("patient")->with("categorytreatment")->get();

		return view('admin.chronicmedication.index', compact('chronicmedication'));
	}

	/**
	 * Show the form for creating a new chronicmedication
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("", "id")->prepend('Please select', 0);

	    
	    return view('admin.chronicmedication.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created chronicmedication in storage.
	 *
     * @param CreateChronicMedicationRequest|Request $request
	 */
	public function store(CreateChronicMedicationRequest $request)
	{
	    
		ChronicMedication::create($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicmedication.index');
	}

	/**
	 * Show the form for editing the specified chronicmedication.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$chronicmedication = ChronicMedication::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("", "id")->prepend('Please select', 0);

	    
		return view('admin.chronicmedication.edit', compact('chronicmedication', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified chronicmedication in storage.
     * @param UpdateChronicMedicationRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateChronicMedicationRequest $request)
	{
		$chronicmedication = ChronicMedication::findOrFail($id);

        

		$chronicmedication->update($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicmedication.index');
	}

	/**
	 * Remove the specified chronicmedication from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ChronicMedication::destroy($id);

		return redirect()->route(config('quickadmin.route').'.chronicmedication.index');
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
            ChronicMedication::destroy($toDelete);
        } else {
            ChronicMedication::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.chronicmedication.index');
    }

}
