<?php

namespace App\Http\Controllers\Api;

use \App\Models\Logistik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'qty' => 'required|integer',
            'kondisi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = Logistik::create([
            'nama' => $request->nama,
            'qty' => $request->qty,
            'kondisi' => $request->kondisi,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'data berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Logistik::find($id);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => "Data Logistik Berhasil Ditemukan",
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Data Logistik Tidak Ditemukan",
                'data' => ''
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'qty' => 'required|integer',
            'kondisi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = Logistik::find($id);
        $data->update([
            'nama' => $request->nama,
            'qty' => $request->qty,
            'kondisi' => $request->kondisi,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'data berhasil di update',
            'data' => $data
        ], 202);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Logistik::find($id);
        if($data){
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'data berhasil dihapus',
                'data' => null
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
                'data' => ''
            ], 404);
        }
    }
}
