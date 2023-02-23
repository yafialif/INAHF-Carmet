<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdhfOutcomes;
use App\Http\Requests\CreateAdhfOutcomesRequest;
use App\Http\Requests\UpdateAdhfOutcomesRequest;
use Illuminate\Http\Request;

use App\Patient;
use App\CategoryTreatment;


class AdhfOutcomesController extends Controller
{

	/**
	 * Display a listing of adhfoutcomes
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\View\View
	 */
	public function index(Request $request)
	{
		$adhfoutcomes = AdhfOutcomes::with("patient")->with("categorytreatment")->get();

		return view('admin.adhfoutcomes.index', compact('adhfoutcomes'));
	}

	/**
	 * Show the form for creating a new adhfoutcomes
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$patient = Patient::pluck("name", "id")->prepend('Please select', 0);
		$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);


		return view('admin.adhfoutcomes.create', compact("patient", "categorytreatment"));
	}

	/**
	 * Store a newly created adhfoutcomes in storage.
	 *
	 * @param CreateAdhfOutcomesRequest|Request $request
	 */
	public function store(CreateAdhfOutcomesRequest $request)
	{

		AdhfOutcomes::create($request->all());

		return redirect()->route(config('quickadmin.route') . '.adhfoutcomes.index');
	}

	/**
	 * Show the form for editing the specified adhfoutcomes.
	 *
	 * @param  int  $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adhfoutcomes = AdhfOutcomes::find($id);
		$patient = Patient::pluck("name", "id")->prepend('Please select', 0);
		$categorytreatment = CategoryTreatment::pluck("treatmentName", "id")->prepend('Please select', 0);


		return view('admin.adhfoutcomes.edit', compact('adhfoutcomes', "patient", "categorytreatment"));
	}

	/**
	 * Update the specified adhfoutcomes in storage.
	 * @param UpdateAdhfOutcomesRequest|Request $request
	 *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdhfOutcomesRequest $request)
	{
		$adhfoutcomes = AdhfOutcomes::findOrFail($id);



		$adhfoutcomes->update($request->all());

		return redirect()->route(config('quickadmin.route') . '.adhfoutcomes.index');
	}

	/**
	 * Remove the specified adhfoutcomes from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdhfOutcomes::destroy($id);

		return redirect()->route(config('quickadmin.route') . '.adhfoutcomes.index');
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
			AdhfOutcomes::destroy($toDelete);
		} else {
			AdhfOutcomes::whereNotNull('id')->delete();
		}

		return redirect()->route(config('quickadmin.route') . '.adhfoutcomes.index');
	}
}
