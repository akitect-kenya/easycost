<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        boolval(true);
        $departments = Department::with('goods')->get();
        return response()->json($departments);
    }
}
