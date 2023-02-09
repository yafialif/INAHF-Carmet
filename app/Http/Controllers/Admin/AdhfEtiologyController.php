<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdhfEtiology;
use App\Http\Requests\CreateAdhfEtiologyRequest;
use App\Http\Requests\UpdateAdhfEtiologyRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class AdhfEtiologyController extends Controller {

	/**
	 * Display a listing of adhfetiology
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $adhfetiology = AdhfEtiology::with("patient")->with("categorytreatment")->get();

		return view('admin.adhfetiology.index', compact('adhfetiology'));
	}

	/**
	 * Show the form for creating a new adhfetiology
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.adhfetiology.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created adhfetiology in storage.
	 *
     * @param CreateAdhfEtiologyRequest|Request $request
	 */
	public function store(CreateAdhfEtiologyRequest $request)
	{
	    
		AdhfEtiology::create($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfetiology.index');
	}

	/**
	 * Show the form for editing the specified adhfetiology.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhfetiology = AdhfEtiology::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.adhfetiology.edit', compact('adhfetiology', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified adhfetiology in storage.
     * @param UpdateAdhfEtiologyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdhfEtiologyRequest $request)
	{
		$adhfetiology = AdhfEtiology::findOrFail($id);

        

		$adhfetiology->update($request->all());

		return redirect()->route(config('quickadmin.route').'.adhfetiology.index');
	}

	/**
	 * Remove the specified adhfetiology from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdhfEtiology::destroy($id);

		return redirect()->route(config('quickadmin.route').'.adhfetiology.index');
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
            AdhfEtiology::destroy($toDelete);
        } else {
            AdhfEtiology::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.adhfetiology.index');
    }

}
