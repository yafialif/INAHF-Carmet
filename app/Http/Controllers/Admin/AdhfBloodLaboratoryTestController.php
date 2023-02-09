<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdhfBloodLaboratoryTest;
use App\Http\Requests\CreateAdhfBloodLaboratoryTestRequest;
use App\Http\Requests\UpdateAdhfBloodLaboratoryTestRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class AdhfBloodLaboratoryTestController extends Controller {

	/**
	 * Display a listing of adhfbloodlaboratorytest
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $adhfbloodlaboratorytest = AdhfBloodLaboratoryTest::with("patient")->with("categorytreatment")->get();

		return view('admin.adhfbloodlaboratorytest.index', compact('adhfbloodlaboratorytest'));
	}

	/**
	 * Show the form for creating a new adhfbloodlaboratorytest
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.adhfbloodlaboratorytest.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created adhfbloodlaboratorytest in storage.
	 *
     * @param CreateAdhfBloodLaboratoryTestRequest|Request $request
	 */
	public function store(CreateAdhfBloodLaboratoryTestRequest $request)
	{
	    
		AdhfBloodLaboratoryTest::create($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfbloodlaboratorytest.index');
	}

	/**
	 * Show the form for editing the specified adhfbloodlaboratorytest.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhfbloodlaboratorytest = AdhfBloodLaboratoryTest::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.adhfbloodlaboratorytest.edit', compact('adhfbloodlaboratorytest', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified adhfbloodlaboratorytest in storage.
     * @param UpdateAdhfBloodLaboratoryTestRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdhfBloodLaboratoryTestRequest $request)
	{
		$adhfbloodlaboratorytest = AdhfBloodLaboratoryTest::findOrFail($id);

        

		$adhfbloodlaboratorytest->update($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfbloodlaboratorytest.index');
	}

	/**
	 * Remove the specified adhfbloodlaboratorytest from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdhfBloodLaboratoryTest::destroy($id);

		return redirect()->route(config('quickadmin.route').'.adhfbloodlaboratorytest.index');
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
            AdhfBloodLaboratoryTest::destroy($toDelete);
        } else {
            AdhfBloodLaboratoryTest::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.adhfbloodlaboratorytest.index');
    }

}
