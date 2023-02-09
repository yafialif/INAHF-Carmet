<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ChronicRoThorax;
use App\Http\Requests\CreateChronicRoThoraxRequest;
use App\Http\Requests\UpdateChronicRoThoraxRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class ChronicRoThoraxController extends Controller {

	/**
	 * Display a listing of chronicrothorax
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $chronicrothorax = ChronicRoThorax::with("patient")->with("categorytreatment")->get();

		return view('admin.chronicrothorax.index', compact('chronicrothorax'));
	}

	/**
	 * Show the form for creating a new chronicrothorax
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.chronicrothorax.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created chronicrothorax in storage.
	 *
     * @param CreateChronicRoThoraxRequest|Request $request
	 */
	public function store(CreateChronicRoThoraxRequest $request)
	{
	    
		ChronicRoThorax::create($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicrothorax.index');
	}

	/**
	 * Show the form for editing the specified chronicrothorax.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$chronicrothorax = ChronicRoThorax::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.chronicrothorax.edit', compact('chronicrothorax', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified chronicrothorax in storage.
     * @param UpdateChronicRoThoraxRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateChronicRoThoraxRequest $request)
	{
		$chronicrothorax = ChronicRoThorax::findOrFail($id);

        

		$chronicrothorax->update($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicrothorax.index');
	}

	/**
	 * Remove the specified chronicrothorax from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ChronicRoThorax::destroy($id);

		return redirect()->route(config('quickadmin.route').'.chronicrothorax.index');
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
            ChronicRoThorax::destroy($toDelete);
        } else {
            ChronicRoThorax::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.chronicrothorax.index');
    }

}
