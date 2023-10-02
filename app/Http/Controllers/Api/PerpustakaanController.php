<?php

namespace App\Http\Controllers\api;

use \App\Models\Perpustakaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
            'berkas' => 'required|mimes:pdf,doc,docx',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors(),
            ], 422);
        }
        $file = $request->berkas;
        $FileName = time() . '_' . $file->getClientOriginalName();
        Storage::putFileAs('public/perpustakaan', $file, $FileName);

        $data = Perpustakaan::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'kategori' => $request->kategori,
            'berkas' => $FileName,
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
            'berkas' => 'mimes:pdf,doc,docx',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors(),
            ], 422);
        }

        if($request->hasFile('berkas')){
            $old_file = Perpustakaan::find($id)->berkas;
            Storage::delete('public/perpustakaan/'.$old_file);

            $file = $request->file('berkas');
            $FileName = time() . '_' . $file->getClientOriginalName();
            Storage::putFileAs('public/perpustakaan', $file, $FileName);

            $data = Perpustakaan::where('id', $id)->update([
                'nama' => $request->nama,
                'divisi' => $request->divisi,
                'kategori' => $request->kategori,
                'berkas' => $FileName,
            ]);
        }else{
            $data = Perpustakaan::where('id', $id)->update([
                'nama' => $request->nama,
                'divisi' => $request->divisi,
                'kategori' => $request->kategori,
            ]);
        }

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
            Storage::delete('public/perpustakaan/'.$data->berkas);
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
