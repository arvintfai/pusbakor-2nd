<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = 'desa';
        $header = 'Desa';
        $table_header = DB::select('desc desas');
        $table_data = Desa::paginate(20);
        return view('admin.desa', compact('rute', 'table_header', 'table_data', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = 'desa';
        $kolom = DB::select('desc desas');
        return view('create.desa', compact('rute','kolom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kolom = DB::select('desc desas');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('desas')->insert([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            }else{
                DB::table('desas')->insert([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('desa')->with('success', 'Data berhasil ditambah');
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
        $rute = 'desa';
        $kolom = DB::select('desc desas');
        $data = Desa::where('id', $id)->get();
        return view('edit.desa', compact('rute','kolom', 'data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kolom = DB::select('desc desas');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('desas')->where('id', $id)->update([
                        $field->Field => $request($field->Field)
                    ]);
                }
            }else{
                DB::table('desas')->where('id', $id)->update([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('desa')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Desa::where('id', $id)->delete();
        return redirect()->route('desa')->with('success', 'Data berhasil dihapus');
    }
}
