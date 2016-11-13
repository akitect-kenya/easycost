<?php

namespace App\Http\Controllers;

use App\Models\SKU;
use Illuminate\Http\Request;

class SKUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($goodId)
    {
        $skus = SKU::where('good_id', $goodId)->get();
        return response()->json($skus);
    }
}
