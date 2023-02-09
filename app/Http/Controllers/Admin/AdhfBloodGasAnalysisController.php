<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdhfBloodGasAnalysis;
use App\Http\Requests\CreateAdhfBloodGasAnalysisRequest;
use App\Http\Requests\UpdateAdhfBloodGasAnalysisRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class AdhfBloodGasAnalysisController extends Controller {

	/**
	 * Display a listing of adhfbloodgasanalysis
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $adhfbloodgasanalysis = AdhfBloodGasAnalysis::with("patient")->with("categorytreatment")->get();

		return view('admin.adhfbloodgasanalysis.index', compact('adhfbloodgasanalysis'));
	}

	/**
	 * Show the form for creating a new adhfbloodgasanalysis
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.adhfbloodgasanalysis.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created adhfbloodgasanalysis in storage.
	 *
     * @param CreateAdhfBloodGasAnalysisRequest|Request $request
	 */
	public function store(CreateAdhfBloodGasAnalysisRequest $request)
	{
	    
		AdhfBloodGasAnalysis::create($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfbloodgasanalysis.index');
	}

	/**
	 * Show the form for editing the specified adhfbloodgasanalysis.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhfbloodgasanalysis = AdhfBloodGasAnalysis::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.adhfbloodgasanalysis.edit', compact('adhfbloodgasanalysis', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified adhfbloodgasanalysis in storage.
     * @param UpdateAdhfBloodGasAnalysisRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdhfBloodGasAnalysisRequest $request)
	{
		$adhfbloodgasanalysis = AdhfBloodGasAnalysis::findOrFail($id);

        

		$adhfbloodgasanalysis->update($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfbloodgasanalysis.index');
	}

	/**
	 * Remove the specified adhfbloodgasanalysis from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdhfBloodGasAnalysis::destroy($id);

		return redirect()->route(config('quickadmin.route').'.adhfbloodgasanalysis.index');
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
            AdhfBloodGasAnalysis::destroy($toDelete);
        } else {
            AdhfBloodGasAnalysis::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.adhfbloodgasanalysis.index');
    }

}
