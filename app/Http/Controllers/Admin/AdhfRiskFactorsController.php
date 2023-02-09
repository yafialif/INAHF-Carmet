<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdhfRiskFactors;
use App\Http\Requests\CreateAdhfRiskFactorsRequest;
use App\Http\Requests\UpdateAdhfRiskFactorsRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class AdhfRiskFactorsController extends Controller {

	/**
	 * Display a listing of adhfriskfactors
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $adhfriskfactors = AdhfRiskFactors::with("patient")->with("categorytreatment")->get();

		return view('admin.adhfriskfactors.index', compact('adhfriskfactors'));
	}

	/**
	 * Show the form for creating a new adhfriskfactors
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.adhfriskfactors.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created adhfriskfactors in storage.
	 *
     * @param CreateAdhfRiskFactorsRequest|Request $request
	 */
	public function store(CreateAdhfRiskFactorsRequest $request)
	{
	    
		AdhfRiskFactors::create($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfriskfactors.index');
	}

	/**
	 * Show the form for editing the specified adhfriskfactors.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhfriskfactors = AdhfRiskFactors::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.adhfriskfactors.edit', compact('adhfriskfactors', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified adhfriskfactors in storage.
     * @param UpdateAdhfRiskFactorsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdhfRiskFactorsRequest $request)
	{
		$adhfriskfactors = AdhfRiskFactors::findOrFail($id);

        

		$adhfriskfactors->update($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfriskfactors.index');
	}

	/**
	 * Remove the specified adhfriskfactors from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdhfRiskFactors::destroy($id);

		return redirect()->route(config('quickadmin.route').'.adhfriskfactors.index');
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
            AdhfRiskFactors::destroy($toDelete);
        } else {
            AdhfRiskFactors::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.adhfriskfactors.index');
    }

}
