<?php

namespace App\Http\Controllers\api;

use \App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::all();
        return response()->json([
            'success' => true,
            'message' => "Data Kategori Berhasil Ditemukan",
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
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = Kategori::create([
            'nama' => $request->nama,
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
    public function show(string $id)
    {
        $data = Kategori::find($id);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => "Data Kategori Berhasil Ditemukan",
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Data Kategori Tidak Ditemukan",
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
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors(),
            ], 422);
        }
        $data = Kategori::find($id);
        $data->update([
            'nama' => $request->nama,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'data berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kategori::find($id);
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
