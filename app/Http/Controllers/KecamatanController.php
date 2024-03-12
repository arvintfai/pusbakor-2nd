<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = 'kecamatan';
        $header = 'Kecamatan';
        $table_header = DB::select('desc kecamatans');
        $table_data = Kecamatan::paginate(20);
        return view('admin.kecamatan', compact('rute','table_header', 'table_data', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = 'kecamatan';
        $kolom = DB::select('desc kecamatans');
        return view('create.kecamatan', compact('rute','kolom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kolom = DB::select('desc kecamatans');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('kecamatans')->insert([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            }else{
                DB::table('kecamatans')->insert([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('kecamatan')->with('success', 'Data berhasil ditambah');
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
        $rute = 'kecamatan';
        $kolom = DB::select('desc kecamatans');
        $data = Kecamatan::where('id', $id)->get();
        return view('edit.kecamatan', compact('rute','kolom', 'data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kolom = DB::select('desc kecamatans');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('kecamatans')->where('id', $id)->update([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            }else{
                DB::table('kecamatans')->where('id', $id)->update([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('kecamatan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kecamatan::where('id', $id)->delete();
        return redirect()->route('kecamatan')->with('success', 'Data berhasil dihapus');
    }
}
