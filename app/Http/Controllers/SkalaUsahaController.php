<?php

namespace App\Http\Controllers;

use App\Models\SkalaUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkalaUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = 'skalausaha';
        $header = 'Skala Usaha';
        $table_header = DB::select('desc skala_usahas');
        $table_data = SkalaUsaha::paginate(20);
        return view('admin.skalausaha', compact('rute', 'table_header', 'table_data', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = 'skalausaha';
        $kolom = DB::select('desc skala_usahas');
        return view('create.skalausaha', compact('rute','kolom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kolom = DB::select('desc skala_usahas');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('skala_usahas')->insert([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            }else{
                DB::table('skala_usahas')->insert([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('skalausaha')->with('success', 'Data berhasil ditambah');
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
        $rute = 'skalausaha';
        $kolom = DB::select('desc skala_usahas');
        $data = SkalaUsaha::where('id', $id)->get();
        return view('edit.skalausaha', compact('rute','kolom', 'data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kolom = DB::select('desc skala_usahas');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('skala_usahas')->where('id', $id)->update([
                        $field->Field => $request($field->Field)
                    ]);
                }
            }else{
                DB::table('skala_usahas')->where('id', $id)->update([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('skalausaha')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SkalaUsaha::where('id', $id)->delete();
        return redirect()->route('skalausaha')->with('success', 'Data berhasil dihapus');
    }
}
