<?php

namespace App\Http\Controllers\api;

use \App\Models\Perpustakaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Perpustakaan::all();
        return response()->json([
            'success' => true,
            'message' => "Data Perpustakaan Berhasil Ditemukan",
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
            'divisi' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors(),
            ], 422);
        }

        $data = Perpustakaan::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'kategori' => $request->kategori,
            'berkas' => $request->berkas,
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
        $data = Perpustakaan::find($id);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => "Data Perpustakaan Berhasil Ditemukan",
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Data Perpustakaan Tidak Ditemukan",
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
            'divisi' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors(),
            ], 422);
        }
        $data = Perpustakaan::find($id);
        $data->update([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'kategori' => $request->kategori,
            'berkas' => $request->berkas,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'data berhasil di update',
            'data' => $data
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Perpustakaan::find($id);
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
