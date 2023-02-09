<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\MonthFollowUp;
use App\Http\Requests\CreateMonthFollowUpRequest;
use App\Http\Requests\UpdateMonthFollowUpRequest;
use Illuminate\Http\Request;



class MonthFollowUpController extends Controller {

	/**
	 * Display a listing of monthfollowup
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $monthfollowup = MonthFollowUp::all();

		return view('admin.monthfollowup.index', compact('monthfollowup'));
	}

	/**
	 * Show the form for creating a new monthfollowup
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.monthfollowup.create');
	}

	/**
	 * Store a newly created monthfollowup in storage.
	 *
     * @param CreateMonthFollowUpRequest|Request $request
	 */
	public function store(CreateMonthFollowUpRequest $request)
	{
	    
		MonthFollowUp::create($request->all());

		return redirect()->route(config('quickadmin.route').'.monthfollowup.index');
	}

	/**
	 * Show the form for editing the specified monthfollowup.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$monthfollowup = MonthFollowUp::find($id);
	    
	    
		return view('admin.monthfollowup.edit', compact('monthfollowup'));
	}

	/**
	 * Update the specified monthfollowup in storage.
     * @param UpdateMonthFollowUpRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMonthFollowUpRequest $request)
	{
		$monthfollowup = MonthFollowUp::findOrFail($id);

        

		$monthfollowup->update($request->all());

		return redirect()->route(config('quickadmin.route').'.monthfollowup.index');
	}

	/**
	 * Remove the specified monthfollowup from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		MonthFollowUp::destroy($id);

		return redirect()->route(config('quickadmin.route').'.monthfollowup.index');
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
            MonthFollowUp::destroy($toDelete);
        } else {
            MonthFollowUp::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.monthfollowup.index');
    }

}
