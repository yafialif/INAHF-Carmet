<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ChronicBloodLaboratoryTest;
use App\Http\Requests\CreateChronicBloodLaboratoryTestRequest;
use App\Http\Requests\UpdateChronicBloodLaboratoryTestRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class ChronicBloodLaboratoryTestController extends Controller {

	/**
	 * Display a listing of chronicbloodlaboratorytest
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $chronicbloodlaboratorytest = ChronicBloodLaboratoryTest::with("patient")->with("categorytreatment")->get();

		return view('admin.chronicbloodlaboratorytest.index', compact('chronicbloodlaboratorytest'));
	}

	/**
	 * Show the form for creating a new chronicbloodlaboratorytest
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.chronicbloodlaboratorytest.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created chronicbloodlaboratorytest in storage.
	 *
     * @param CreateChronicBloodLaboratoryTestRequest|Request $request
	 */
	public function store(CreateChronicBloodLaboratoryTestRequest $request)
	{
	    
		ChronicBloodLaboratoryTest::create($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicbloodlaboratorytest.index');
	}

	/**
	 * Show the form for editing the specified chronicbloodlaboratorytest.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$chronicbloodlaboratorytest = ChronicBloodLaboratoryTest::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.chronicbloodlaboratorytest.edit', compact('chronicbloodlaboratorytest', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified chronicbloodlaboratorytest in storage.
     * @param UpdateChronicBloodLaboratoryTestRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateChronicBloodLaboratoryTestRequest $request)
	{
		$chronicbloodlaboratorytest = ChronicBloodLaboratoryTest::findOrFail($id);

        

		$chronicbloodlaboratorytest->update($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicbloodlaboratorytest.index');
	}

	/**
	 * Remove the specified chronicbloodlaboratorytest from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ChronicBloodLaboratoryTest::destroy($id);

		return redirect()->route(config('quickadmin.route').'.chronicbloodlaboratorytest.index');
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
            ChronicBloodLaboratoryTest::destroy($toDelete);
        } else {
            ChronicBloodLaboratoryTest::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.chronicbloodlaboratorytest.index');
    }

}
