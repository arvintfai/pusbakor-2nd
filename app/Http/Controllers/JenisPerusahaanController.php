<?php

namespace App\Http\Controllers;

use App\Models\JenisPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = 'jenisperusahaan';
        $header = 'Jenis Perusahaan';
        $table_header = DB::select('desc jenis_perusahaans');
        $table_data = JenisPerusahaan::paginate(20);
        return view('admin.jenisperusahaan', compact('rute', 'table_header', 'table_data', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = 'jenisperusahaan';
        $kolom = DB::select('desc jenis_perusahaans');
        return view('create.jenisperusahaan', compact('rute','kolom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kolom = DB::select('desc jenis_perusahaans');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('jenis_perusahaans')->insert([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            }else{
                DB::table('jenis_perusahaans')->insert([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('jenisperusahaan')->with('success', 'Data berhasil ditambah');
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
        $rute = 'jenisperusahaan';
        $kolom = DB::select('desc jenis_perusahaans');
        $data = JenisPerusahaan::where('id', $id)->get();
        return view('edit.skalausaha', compact('rute','kolom', 'data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kolom = DB::select('desc jenis_perusahaans');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('jenis_perusahaans')->where('id', $id)->update([
                        $field->Field => $request($field->Field)
                    ]);
                }
            }else{
                DB::table('jenis_perusahaans')->where('id', $id)->update([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('jenisperusahaan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JenisPerusahaan::where('id', $id)->delete();
        return redirect()->route('jenisperusahaan')->with('success', 'Data berhasil dihapus');
    }
}
