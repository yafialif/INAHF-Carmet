<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CronicRiskFactors;
use App\Http\Requests\CreateCronicRiskFactorsRequest;
use App\Http\Requests\UpdateCronicRiskFactorsRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class CronicRiskFactorsController extends Controller {

	/**
	 * Display a listing of cronicriskfactors
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $cronicriskfactors = CronicRiskFactors::with("patient")->with("categorytreatment")->get();

		return view('admin.cronicriskfactors.index', compact('cronicriskfactors'));
	}

	/**
	 * Show the form for creating a new cronicriskfactors
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.cronicriskfactors.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created cronicriskfactors in storage.
	 *
     * @param CreateCronicRiskFactorsRequest|Request $request
	 */
	public function store(CreateCronicRiskFactorsRequest $request)
	{
	    
		CronicRiskFactors::create($request->all());

		return redirect()->route(config('quickadmin.route').'.cronicriskfactors.index');
	}

	/**
	 * Show the form for editing the specified cronicriskfactors.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$cronicriskfactors = CronicRiskFactors::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.cronicriskfactors.edit', compact('cronicriskfactors', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified cronicriskfactors in storage.
     * @param UpdateCronicRiskFactorsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCronicRiskFactorsRequest $request)
	{
		$cronicriskfactors = CronicRiskFactors::findOrFail($id);

        

		$cronicriskfactors->update($request->all());

		return redirect()->route(config('quickadmin.route').'.cronicriskfactors.index');
	}

	/**
	 * Remove the specified cronicriskfactors from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CronicRiskFactors::destroy($id);

		return redirect()->route(config('quickadmin.route').'.cronicriskfactors.index');
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
            CronicRiskFactors::destroy($toDelete);
        } else {
            CronicRiskFactors::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.cronicriskfactors.index');
    }

}
