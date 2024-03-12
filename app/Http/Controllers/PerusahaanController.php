<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\JenisPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = 'perusahaan';
        $table_data = Perusahaan::with('jenisperusahaan')->paginate(20);
        $header = 'Perusahaan';
        $table_header = DB::select('desc perusahaans');

        return view('admin.perusahaan', compact('rute', 'table_header', 'table_data', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = 'perusahaan';
        $kolom = DB::select('desc perusahaans');
        $select = ['jenis_perusahaan'=>JenisPerusahaan::all()];
        return view('create.perusahaan', compact('rute','kolom','select'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kolom = DB::select('desc perusahaans');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                    if(str_contains($field->Field, '_id')){
                        $data[$field->Field] = $request[$field->Field];
                        }
                    }else{
                        $data[$field->Field] = $request[$field->Field];
                    }
        }
        // $data=["NIB"=>$request["NIB"],"NPWP"=>$request["NPWP"],"nama"=>$request["nama"],"jenis_perusahaan_id"=>$request["jenis_perusahaan_id"]];
        DB::table('perusahaans')->insert(
            $data
        );
        return redirect()->route('perusahaan')->with('success', 'Data berhasil ditambah');
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
        $rute = 'perusahaan';
        $kolom = DB::select('desc perusahaans');
        $data = Perusahaan::where('id', $id)->get();
        $select = ['jenis_perusahaan'=>JenisPerusahaan::all()];
        return view('edit.perusahaan', compact('rute', 'kolom', 'data', 'id', 'select'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kolom = DB::select('desc perusahaans');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('perusahaans')->where('id', $id)->update([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            }else{
                DB::table('perusahaans')->where('id', $id)->update([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('perusahaan')->with('success', 'Skala Usaha berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Perusahaan::where('id', $id)->delete();
        return redirect()->route('perusahaan')->with('success', 'Skala Usaha berhasil dihapus');
    }
}
