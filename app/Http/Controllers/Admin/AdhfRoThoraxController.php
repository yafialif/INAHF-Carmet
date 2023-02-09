<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdhfRoThorax;
use App\Http\Requests\CreateAdhfRoThoraxRequest;
use App\Http\Requests\UpdateAdhfRoThoraxRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class AdhfRoThoraxController extends Controller {

	/**
	 * Display a listing of adhfrothorax
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $adhfrothorax = AdhfRoThorax::with("patient")->with("categorytreatment")->get();

		return view('admin.adhfrothorax.index', compact('adhfrothorax'));
	}

	/**
	 * Show the form for creating a new adhfrothorax
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.adhfrothorax.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created adhfrothorax in storage.
	 *
     * @param CreateAdhfRoThoraxRequest|Request $request
	 */
	public function store(CreateAdhfRoThoraxRequest $request)
	{
	    
		AdhfRoThorax::create($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfrothorax.index');
	}

	/**
	 * Show the form for editing the specified adhfrothorax.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhfrothorax = AdhfRoThorax::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.adhfrothorax.edit', compact('adhfrothorax', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified adhfrothorax in storage.
     * @param UpdateAdhfRoThoraxRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdhfRoThoraxRequest $request)
	{
		$adhfrothorax = AdhfRoThorax::findOrFail($id);

        

		$adhfrothorax->update($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfrothorax.index');
	}

	/**
	 * Remove the specified adhfrothorax from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdhfRoThorax::destroy($id);

		return redirect()->route(config('quickadmin.route').'.adhfrothorax.index');
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
            AdhfRoThorax::destroy($toDelete);
        } else {
            AdhfRoThorax::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.adhfrothorax.index');
    }

}
