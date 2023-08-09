<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Support\Facades\Auth;

class AdhfFollowupController extends Controller
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
		$user_id = Auth::user()->id;
		$role_id = Auth::user()->role_id;
		if ($role_id <= 2) {
			$patient = Patient::with('user', 'clinicalprofile',)
				->where('categorytreatment_id', '=', 1)
				->whereRaw('TIMESTAMPDIFF(HOUR, created_at, updated_at) < 1')
				->get();
		} else {
			$patient = Patient::with('user', 'clinicalprofile',)
				->where('categorytreatment_id', '=', 1)
				->whereRaw('TIMESTAMPDIFF(HOUR, created_at, updated_at) < 1')
				->where('user_id', '=', $user_id)
				->get();
		}
		$threeMonthsAgo = date('Y-m-d', strtotime('-3 months'));
		$data = [];
		foreach ($patient as $patient) {
			if ($patient['dateOfAdmission'] < $threeMonthsAgo) {
				// if ($patient['created_at'] == $patient['updated_at']) {
				array_push($data, $patient);
				// }
			}
		}
		// return response()->json($data);
		return view('admin.adhffollowup.index', compact('data'));
	}
}
