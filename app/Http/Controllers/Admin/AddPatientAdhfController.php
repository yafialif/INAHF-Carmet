<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AddPatientAdhfController extends Controller
{

	/**
	 * Index page
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		// return view('admin.addpatientadhf.index');
		return redirect()->route('admin.listpatientadhf.create');
	}
}
