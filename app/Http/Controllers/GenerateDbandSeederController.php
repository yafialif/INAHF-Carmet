<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryTreatment;
use Laraveldaily\Quickadmin\Models\Menu;
use App\MenuRole;
use App\Role;
use App\MonthFollowUp;

class GenerateDbandSeederController extends Controller
{
    //
    public function index()
    {
        $CategoryTreatment = CategoryTreatment::all();
        // return response()->json($CategoryTreatment);
        $Menu = Menu::all();
        // return response()->json($Menu);
        $MenuRole = MenuRole::all();
        // return response()->json($MenuRole);
        $Role = Role::all();
        return response()->json($Role);
    }
}
