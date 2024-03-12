<?php

namespace App\Http\Controllers;

use App\Models\JenisPerusahaan;
use App\Models\Modal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusModalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = 'statusmodal';
        $header = 'Status Modal';
        $table_header = DB::select('desc modals');
        $table_data =Modal::paginate(20);
        return view('admin.statusmodal', compact('rute', 'table_header', 'table_data', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = 'statusmodal';
        $kolom = DB::select('desc modals');
        return view('create.statusmodal', compact('rute','kolom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kolom = DB::select('desc modals');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('modals')->insert([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            }else{
                DB::table('modals')->insert([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('statusmodal')->with('success', 'Data berhasil ditambah');
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
        $rute = 'statusmodal';
        $kolom = DB::select('desc modals');
        $data = Modal::where('id', $id)->get();
        return view('edit.statusmodal', compact('rute', 'kolom', 'data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kolom = DB::select('desc modals');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('modals')->where('id', $id)->update([
                        $field->Field => $request[$field->Field]
                    ]);
                }
            }else{
                DB::table('modals')->where('id', $id)->update([
                    $field->Field => $request[$field->Field]
                ]);
            }
        }
        return redirect()->route('statusmodal')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Modal::where('id', $id)->delete();
        return redirect()->route('statusmodal')->with('success', 'Data berhasil dihapus');
    }
}
