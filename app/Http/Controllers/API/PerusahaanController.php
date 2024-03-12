<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PerusahaanResource;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
            return PerusahaanResource::collection(Perusahaan::with('jenisperusahaan')->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'NIB' => $request->NIB,
            'NPWP' => $request->NPWP,
            'nama' => $request->nama,
            'jenis_perusahaan_id' => $request->jenis_perusahaan_id
        ];
        return response()->json(['Data berhasil ditambahkan', new PerusahaanResource(DB::table('perusahaans')->insert($data))]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $perusahaan->NIB = $request->NIB;
        $perusahaan->NPWP = $request->NPWP;
        $perusahaan->nama = $request->nama;
        $perusahaan->jenis_perusahaan_id = $request->jenis_perusahaan_id;
        $perusahaan->save();
        return response()->json(['Data berhasil di update', new PerusahaanResource($perusahaan)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();
        return response()->json(['Data berhasil dihapus']);
    }

    public function select(){
        return PerusahaanResource::collection(Perusahaan::all());
    }
}
