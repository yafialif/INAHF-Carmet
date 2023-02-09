<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdhfHospitalization;
use App\Http\Requests\CreateAdhfHospitalizationRequest;
use App\Http\Requests\UpdateAdhfHospitalizationRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class AdhfHospitalizationController extends Controller {

	/**
	 * Display a listing of adhfhospitalization
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $adhfhospitalization = AdhfHospitalization::with("patient")->with("categorytreatment")->get();

		return view('admin.adhfhospitalization.index', compact('adhfhospitalization'));
	}

	/**
	 * Show the form for creating a new adhfhospitalization
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.adhfhospitalization.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created adhfhospitalization in storage.
	 *
     * @param CreateAdhfHospitalizationRequest|Request $request
	 */
	public function store(CreateAdhfHospitalizationRequest $request)
	{
	    
		AdhfHospitalization::create($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfhospitalization.index');
	}

	/**
	 * Show the form for editing the specified adhfhospitalization.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhfhospitalization = AdhfHospitalization::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.adhfhospitalization.edit', compact('adhfhospitalization', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified adhfhospitalization in storage.
     * @param UpdateAdhfHospitalizationRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdhfHospitalizationRequest $request)
	{
		$adhfhospitalization = AdhfHospitalization::findOrFail($id);

        

		$adhfhospitalization->update($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfhospitalization.index');
	}

	/**
	 * Remove the specified adhfhospitalization from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdhfHospitalization::destroy($id);

		return redirect()->route(config('quickadmin.route').'.adhfhospitalization.index');
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
            AdhfHospitalization::destroy($toDelete);
        } else {
            AdhfHospitalization::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.adhfhospitalization.index');
    }

}
