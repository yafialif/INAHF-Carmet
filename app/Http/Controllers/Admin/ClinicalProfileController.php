<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ClinicalProfile;
use App\Http\Requests\CreateClinicalProfileRequest;
use App\Http\Requests\UpdateClinicalProfileRequest;
use Illuminate\Http\Request;

use App\User;
use App\CategoryTreatment;


class ClinicalProfileController extends Controller {

	/**
	 * Display a listing of clinicalprofile
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $clinicalprofile = ClinicalProfile::with("user")->with("categorytreatment")->get();

		return view('admin.clinicalprofile.index', compact('clinicalprofile'));
	}

	/**
	 * Show the form for creating a new clinicalprofile
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.clinicalprofile.create', compact("user", "categorytreatment"));
	}

	/**
	 * Store a newly created clinicalprofile in storage.
	 *
     * @param CreateClinicalProfileRequest|Request $request
	 */
	public function store(CreateClinicalProfileRequest $request)
	{
	    
		ClinicalProfile::create($request->all());

		return redirect()->route(config('quickadmin.route').'.clinicalprofile.index');
	}

	/**
	 * Show the form for editing the specified clinicalprofile.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$clinicalprofile = ClinicalProfile::find($id);
	    $user = User::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.clinicalprofile.edit', compact('clinicalprofile', "user", "categorytreatment"));
	}

	/**
	 * Update the specified clinicalprofile in storage.
     * @param UpdateClinicalProfileRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateClinicalProfileRequest $request)
	{
		$clinicalprofile = ClinicalProfile::findOrFail($id);

        

		$clinicalprofile->update($request->all());

		return redirect()->route(config('quickadmin.route').'.clinicalprofile.index');
	}

	/**
	 * Remove the specified clinicalprofile from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ClinicalProfile::destroy($id);

		return redirect()->route(config('quickadmin.route').'.clinicalprofile.index');
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
            ClinicalProfile::destroy($toDelete);
        } else {
            ClinicalProfile::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.clinicalprofile.index');
    }

}
