<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ChronicOutcomes;
use App\Http\Requests\CreateChronicOutcomesRequest;
use App\Http\Requests\UpdateChronicOutcomesRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class ChronicOutcomesController extends Controller {

	/**
	 * Display a listing of chronicoutcomes
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $chronicoutcomes = ChronicOutcomes::with("patient")->with("categorytreatment")->get();

		return view('admin.chronicoutcomes.index', compact('chronicoutcomes'));
	}

	/**
	 * Show the form for creating a new chronicoutcomes
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
	    return view('admin.chronicoutcomes.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created chronicoutcomes in storage.
	 *
     * @param CreateChronicOutcomesRequest|Request $request
	 */
	public function store(CreateChronicOutcomesRequest $request)
	{
	    
		ChronicOutcomes::create($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicoutcomes.index');
	}

	/**
	 * Show the form for editing the specified chronicoutcomes.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$chronicoutcomes = ChronicOutcomes::find($id);
	    $patient = Patient::pluck("name", "id")->prepend('Please select', 0);
$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);

	    
		return view('admin.chronicoutcomes.edit', compact('chronicoutcomes', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified chronicoutcomes in storage.
     * @param UpdateChronicOutcomesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateChronicOutcomesRequest $request)
	{
		$chronicoutcomes = ChronicOutcomes::findOrFail($id);

        

		$chronicoutcomes->update($request->all());

		return redirect()->route(config('quickadmin.route').'.chronicoutcomes.index');
	}

	/**
	 * Remove the specified chronicoutcomes from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ChronicOutcomes::destroy($id);

		return redirect()->route(config('quickadmin.route').'.chronicoutcomes.index');
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
            ChronicOutcomes::destroy($toDelete);
        } else {
            ChronicOutcomes::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.chronicoutcomes.index');
    }

}
