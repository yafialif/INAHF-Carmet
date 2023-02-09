<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\RumahSakit;
use App\Http\Requests\CreateRumahSakitRequest;
use App\Http\Requests\UpdateRumahSakitRequest;
use Illuminate\Http\Request;

use App\User;


class RumahSakitController extends Controller {

	/**
	 * Display a listing of rumahsakit
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $rumahsakit = RumahSakit::with("user")->get();

		return view('admin.rumahsakit.index', compact('rumahsakit'));
	}

	/**
	 * Show the form for creating a new rumahsakit
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("name", "id")->prepend('Please select', 0);

	    
	    return view('admin.rumahsakit.create', compact("user"));
	}

	/**
	 * Store a newly created rumahsakit in storage.
	 *
     * @param CreateRumahSakitRequest|Request $request
	 */
	public function store(CreateRumahSakitRequest $request)
	{
	    
		RumahSakit::create($request->all());

		return redirect()->route(config('quickadmin.route').'.rumahsakit.index');
	}

	/**
	 * Show the form for editing the specified rumahsakit.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$rumahsakit = RumahSakit::find($id);
	    $user = User::pluck("name", "id")->prepend('Please select', 0);

	    
		return view('admin.rumahsakit.edit', compact('rumahsakit', "user"));
	}

	/**
	 * Update the specified rumahsakit in storage.
     * @param UpdateRumahSakitRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateRumahSakitRequest $request)
	{
		$rumahsakit = RumahSakit::findOrFail($id);

        

		$rumahsakit->update($request->all());

		return redirect()->route(config('quickadmin.route').'.rumahsakit.index');
	}

	/**
	 * Remove the specified rumahsakit from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		RumahSakit::destroy($id);

		return redirect()->route(config('quickadmin.route').'.rumahsakit.index');
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
            RumahSakit::destroy($toDelete);
        } else {
            RumahSakit::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.rumahsakit.index');
    }

}
