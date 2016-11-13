<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $departmentId
     * @return \Illuminate\Http\Response
     */
    public function index($departmentId)
    {
        $goods = Good::where('department_id', $departmentId)->get();

        return response()->json($goods);
    }

    /**
     * Fetch a single resource.
     *
     * @param $goodId
     * @return \Illuminate\Http\Response
     */
    public function show($goodId)
    {
        $good = Good::find($goodId);

        return response()->json($good);
    }
}
