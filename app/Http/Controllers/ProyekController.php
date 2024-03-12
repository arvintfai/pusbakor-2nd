<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\KBLI;
use App\Models\Kecamatan;
use App\Models\Modal;
use App\Models\Perusahaan;
use App\Models\Proyek;
use App\Models\Resiko;
use App\Models\SkalaUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 20);
        $rute = 'proyek';
        $table_data = Proyek::with('perusahaan')
            ->with('modal', 'resiko', 'skalausaha', 'kbli', 'kecamatan', 'desa')
            ->paginate($perPage);
        $header = 'Proyek';
        $table_header = DB::select('desc proyeks');
        if ($request->ajax()) {
            return view('layouts.table_content', compact('rute', 'table_header', 'table_data', 'header', 'perPage'));
        }
        return view('admin.proyek', compact('rute', 'table_header', 'table_data', 'header', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = 'proyek';
        $kolom = DB::select('desc proyeks');
        $select = ['perusahaan' => Perusahaan::all(), 'modal' => Modal::all(), 'resiko' => Resiko::all(), 'skala_usaha' => SkalaUsaha::all(), 'kecamatan' => Kecamatan::all(), 'desa' => Desa::all(), 'kbli' => KBLI::all()];
        return view('create.proyek', compact('rute', 'kolom', 'select'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kolom = DB::select('desc proyeks');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                    if(str_contains($field->Field, '_id')){
                        $data[$field->Field]=$request[$field->Field];
                        }
                    }else{
                        $data[$field->Field]=$request[$field->Field];
                    }
        }
        // $data = ["longitude" => $request["longitude"], "latitude" => $request["latitude"], "alamat" => $request["alamat"], "investasi" => $request["investasi"], "perusahaan_id" => $request["perusahaan_id"], "modal_id" => $request["modal_id"], "resiko_id" => $request["resiko_id"], "skala_usaha_id" => $request["skala_usaha_id"], "kecamatan_id" => $request["kecamatan_id"], "desa_id" => $request["desa_id"], "kbli_id" => $request["kbli_id"]];
        DB::table('proyeks')->insert(
            $data
        );
        return redirect()->route('proyek')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rute = 'proyek';
        $kolom = DB::select('desc proyeks');
        $data = Proyek::where('id', $id)->get();
        $select = ['perusahaan' => Perusahaan::all(), 'modal' => Modal::all(), 'resiko' => Resiko::all(), 'skala_usaha' => SkalaUsaha::all(), 'kecamatan' => Kecamatan::all(), 'desa' => Desa::all(), 'kbli' => KBLI::all()];
        return view('edit.proyek', compact('rute', 'kolom', 'data', 'id', 'select'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kolom = DB::select('desc proyeks');
        foreach ($kolom as $field) {
            if (str_contains($field->Field, 'id') || str_contains($field->Field, 'created') || str_contains($field->Field, 'updated')) {
                if (str_contains($field->Field, '_id')) {
                    DB::table('proyeks')->where('id', $id)->update([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            } else {
                DB::table('proyeks')->where('id', $id)->update([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('proyek')->with('success', 'Skala Usaha berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Proyek::where('id', $id)->delete();
        return redirect()->route('proyek')->with('success', 'Skala Usaha berhasil dihapus');
    }
}
