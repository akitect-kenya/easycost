<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sheet;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $sheetId
     * @return \Illuminate\Http\Response
     */
    public function index($sheetId)
    {
        $products = Product::where('sheet_id', $sheetId)->get();

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $sheetId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sheetId)
    {
        $product = Sheet::find($sheetId)->products()->create($request->all());

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param $sheetId
     * @return \Illuminate\Http\Response
     */
    public function show($id, $sheetId)
    {
        $product = Sheet::find($sheetId)->products()->find($id);

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param $sheetId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sheetId, $id)
    {
        $sheet = Sheet::find($sheetId);
        $product = $sheet->products()->find($id);
        $product->update($request->all());

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param $sheetId
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $sheetId)
    {
        $product = Sheet::find($sheetId)->products()->find($id);
        $product->delete();

        return response()->json(["message" => "Product successfully deleted"]);
    }
}
