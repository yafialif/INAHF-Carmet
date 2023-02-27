<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManageDokterController extends Controller
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
		// $users = User::all();
		$users = DB::table('users')
			->join('roles', 'roles.id', '=', 'users.role_id')
			->where('role_id', '>', 2)->get();
		return view('admin.managedokter.index', compact('users'));
	}

	/**
	 * Show a page of user creation
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		// $roles = Role::pluck('title', 'id');
		$roles = Role::where('id', '>', 2)->pluck('title', 'id');
		// return $roles;
		return view('admin.managedokter.create', compact('roles'));
	}

	/**
	 * Insert new user into the system
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		$input['password'] = Hash::make($input['password']);
		$user = User::create($input);

		return redirect()->route('admin.managedokter.index')->withMessage(trans('quickadmin::admin.users-controller-successfully_created'));
	}

	/**
	 * Show a user edit page
	 *
	 * @param $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$user  = User::findOrFail($id);
		$roles = Role::pluck('title', 'id');

		return view('admin.managedokter.edit', compact('user', 'roles'));
	}

	/**
	 * Update our user information
	 *
	 * @param Request $request
	 * @param         $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, $id)
	{
		$user = User::findOrFail($id);
		$input = $request->all();
		$input['password'] = Hash::make($input['password']);
		$user->update($input);

		return redirect()->route('admin.managedokter.index')->withMessage(trans('quickadmin::admin.users-controller-successfully_updated'));
	}

	/**
	 * Destroy specific user
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		User::destroy($id);

		return redirect()->route('admin.managedokter.index')->withMessage(trans('quickadmin::admin.users-controller-successfully_deleted'));
	}
}
