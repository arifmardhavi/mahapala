<?php

namespace App\Http\Controllers\Api;

use \App\Models\Logistik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Logistik::all();
        return response()->json([
            'success' => true,
            'message' => "Data Logistik Berhasil Ditemukan",
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
