<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ListAllDataAdhfController extends Controller {

	/**
	 * Index page
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index()
    {
		return view('admin.listalldataadhf.index');
	}

}