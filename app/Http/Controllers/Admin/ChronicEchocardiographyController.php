<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ChronicEchocardiography;
use App\Http\Requests\CreateChronicEchocardiographyRequest;
use App\Http\Requests\UpdateChronicEchocardiographyRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class ChronicEchocardiographyController extends Controller {

	/**
	 * Display a listing of chronicechocardiography
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $chronicechocardiography = ChronicEchocardiography::with("patient")->with("categorytreatment")->get();

		return view('admin.chronicechocardiography.index', compact('chronicechocardiography'));
	}

	/**
	 * Show the form for creating a new chronicechocardiography
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.chronicechocardiography.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created chronicechocardiography in storage.
	 *
     * @param CreateChronicEchocardiographyRequest|Request $request
	 */
	public function store(CreateChronicEchocardiographyRequest $request)
	{
	    
		ChronicEchocardiography::create($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicechocardiography.index');
	}

	/**
	 * Show the form for editing the specified chronicechocardiography.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$chronicechocardiography = ChronicEchocardiography::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.chronicechocardiography.edit', compact('chronicechocardiography', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified chronicechocardiography in storage.
     * @param UpdateChronicEchocardiographyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateChronicEchocardiographyRequest $request)
	{
		$chronicechocardiography = ChronicEchocardiography::findOrFail($id);

        

		$chronicechocardiography->update($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicechocardiography.index');
	}

	/**
	 * Remove the specified chronicechocardiography from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ChronicEchocardiography::destroy($id);

		return redirect()->route(config('quickadmin.route').'.chronicechocardiography.index');
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
            ChronicEchocardiography::destroy($toDelete);
        } else {
            ChronicEchocardiography::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.chronicechocardiography.index');
    }

}
