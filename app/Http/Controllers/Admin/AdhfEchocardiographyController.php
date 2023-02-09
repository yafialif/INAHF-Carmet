<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdhfEchocardiography;
use App\Http\Requests\CreateAdhfEchocardiographyRequest;
use App\Http\Requests\UpdateAdhfEchocardiographyRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class AdhfEchocardiographyController extends Controller {

	/**
	 * Display a listing of adhfechocardiography
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $adhfechocardiography = AdhfEchocardiography::with("patient")->with("categorytreatment")->get();

		return view('admin.adhfechocardiography.index', compact('adhfechocardiography'));
	}

	/**
	 * Show the form for creating a new adhfechocardiography
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.adhfechocardiography.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created adhfechocardiography in storage.
	 *
     * @param CreateAdhfEchocardiographyRequest|Request $request
	 */
	public function store(CreateAdhfEchocardiographyRequest $request)
	{
	    
		AdhfEchocardiography::create($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfechocardiography.index');
	}

	/**
	 * Show the form for editing the specified adhfechocardiography.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhfechocardiography = AdhfEchocardiography::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.adhfechocardiography.edit', compact('adhfechocardiography', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified adhfechocardiography in storage.
     * @param UpdateAdhfEchocardiographyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdhfEchocardiographyRequest $request)
	{
		$adhfechocardiography = AdhfEchocardiography::findOrFail($id);

        

		$adhfechocardiography->update($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfechocardiography.index');
	}

	/**
	 * Remove the specified adhfechocardiography from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdhfEchocardiography::destroy($id);

		return redirect()->route(config('quickadmin.route').'.adhfechocardiography.index');
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
            AdhfEchocardiography::destroy($toDelete);
        } else {
            AdhfEchocardiography::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.adhfechocardiography.index');
    }

}
