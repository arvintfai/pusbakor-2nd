<?php

namespace App\Http\Controllers;

use App\Models\Resiko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResikoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = 'resiko';
        $header = 'Resiko';
        $table_header = DB::select('desc resikos');
        $table_data = Resiko::paginate(20);
        return view('admin.resiko', compact('rute', 'table_header', 'table_data', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = 'resiko';
        $kolom = DB::select('desc resikos');
        return view('create.statusmodal', compact('rute','kolom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kolom = DB::select('desc resikos');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('resikos')->insert([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            }else{
                DB::table('resikos')->insert([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('resiko')->with('success', 'Data berhasil ditambah');
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
        $rute = 'resiko';
        $kolom = DB::select('desc resikos');
        $data = Resiko::where('id', $id)->get();
        return view('edit.resiko', compact('rute','kolom', 'data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kolom = DB::select('desc resikos');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('resikos')->where('id', $id)->update([
                        $field->Field => $request($field->Field)
                    ]);
                }
            }else{
                DB::table('resikos')->where('id', $id)->update([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('resiko')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Resiko::where('id', $id)->delete();
        return redirect()->route('resiko')->with('success', 'Data berhasil dihapus');
    }
}
