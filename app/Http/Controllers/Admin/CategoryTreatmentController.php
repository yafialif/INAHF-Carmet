<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CategoryTreatment;
use App\Http\Requests\CreateCategoryTreatmentRequest;
use App\Http\Requests\UpdateCategoryTreatmentRequest;
use Illuminate\Http\Request;



class CategoryTreatmentController extends Controller {

	/**
	 * Display a listing of categorytreatment
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $categorytreatment = CategoryTreatment::all();

		return view('admin.categorytreatment.index', compact('categorytreatment'));
	}

	/**
	 * Show the form for creating a new categorytreatment
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.categorytreatment.create');
	}

	/**
	 * Store a newly created categorytreatment in storage.
	 *
     * @param CreateCategoryTreatmentRequest|Request $request
	 */
	public function store(CreateCategoryTreatmentRequest $request)
	{
	    
		CategoryTreatment::create($request->all());

		return redirect()->route(config('quickadmin.route').'.categorytreatment.index');
	}

	/**
	 * Show the form for editing the specified categorytreatment.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$categorytreatment = CategoryTreatment::find($id);
	    
	    
		return view('admin.categorytreatment.edit', compact('categorytreatment'));
	}

	/**
	 * Update the specified categorytreatment in storage.
     * @param UpdateCategoryTreatmentRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCategoryTreatmentRequest $request)
	{
		$categorytreatment = CategoryTreatment::findOrFail($id);

        

		$categorytreatment->update($request->all());

		return redirect()->route(config('quickadmin.route').'.categorytreatment.index');
	}

	/**
	 * Remove the specified categorytreatment from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CategoryTreatment::destroy($id);

		return redirect()->route(config('quickadmin.route').'.categorytreatment.index');
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
            CategoryTreatment::destroy($toDelete);
        } else {
            CategoryTreatment::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.categorytreatment.index');
    }

}
