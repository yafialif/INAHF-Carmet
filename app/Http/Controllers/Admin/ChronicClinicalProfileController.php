<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ChronicClinicalProfile;
use App\Http\Requests\CreateChronicClinicalProfileRequest;
use App\Http\Requests\UpdateChronicClinicalProfileRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class ChronicClinicalProfileController extends Controller {

	/**
	 * Display a listing of chronicclinicalprofile
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $chronicclinicalprofile = ChronicClinicalProfile::with("patient")->with("categorytreatment")->get();

		return view('admin.chronicclinicalprofile.index', compact('chronicclinicalprofile'));
	}

	/**
	 * Show the form for creating a new chronicclinicalprofile
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.chronicclinicalprofile.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created chronicclinicalprofile in storage.
	 *
     * @param CreateChronicClinicalProfileRequest|Request $request
	 */
	public function store(CreateChronicClinicalProfileRequest $request)
	{
	    
		ChronicClinicalProfile::create($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicclinicalprofile.index');
	}

	/**
	 * Show the form for editing the specified chronicclinicalprofile.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$chronicclinicalprofile = ChronicClinicalProfile::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.chronicclinicalprofile.edit', compact('chronicclinicalprofile', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified chronicclinicalprofile in storage.
     * @param UpdateChronicClinicalProfileRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateChronicClinicalProfileRequest $request)
	{
		$chronicclinicalprofile = ChronicClinicalProfile::findOrFail($id);

        

		$chronicclinicalprofile->update($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicclinicalprofile.index');
	}

	/**
	 * Remove the specified chronicclinicalprofile from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ChronicClinicalProfile::destroy($id);

		return redirect()->route(config('quickadmin.route').'.chronicclinicalprofile.index');
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
            ChronicClinicalProfile::destroy($toDelete);
        } else {
            ChronicClinicalProfile::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.chronicclinicalprofile.index');
    }

}
