<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Sheet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $goodId
     * @return \Illuminate\Http\Response
     */
    public function index($goodId)
    {
        $sheets = Good::find($goodId)->sheets()->with('products')->get();

        return response()->json($sheets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $goodId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $goodId)
    {
        $sheet = Good::find($goodId)->sheets()->create($request->all());

        return response()->json($sheet);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param int $goodId
     * @return \Illuminate\Http\Response
     */
    public function show($goodId, $id)
    {
        $sheet = Good::find($goodId)->sheets()->find($id);

        return response()->json($sheet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $goodId
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $goodId, $id)
    {
        $sheet = Good::find($goodId)->sheets()->find($id);
        $sheet->update($request->all());

        return response()->json($sheet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $goodId
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($goodId, $id)
    {
        $sheet = Good::find($goodId)->sheets()->find($id);
        $sheet->delete();

        return response()->json(["message" => "Sheet successfully deleted"]);
    }

    /**
     * Export a sheet as an .xls document
     *
     * @param $goodId
     * @param $id
     * @return mixed
     */
    public function export($goodId, $id)
    {
        $sheet = Good::find($goodId)->sheets()->find($id);
        $data = $sheet->products()->get()->toArray();

        return Excel::create($sheet->name, function($excel) use ($data) {
            $excel->sheet('Sheet1', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xls');
    }
}
