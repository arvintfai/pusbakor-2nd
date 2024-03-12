<?php

namespace App\Http\Controllers;

use App\Models\KBLI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class KBLIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rute = 'kbli';
        $header = 'KBLI';
        $table_header = DB::select('desc kblis');
        $table_data = KBLI::paginate(20);
        return view('admin.kbli', compact('rute', 'table_header', 'table_data', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rute = 'kbli';
        $kolom = DB::select('desc kblis');
        return view('create.kbli', compact('rute','kolom'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $kolom = DB::select('desc kblis');
        // foreach($kolom as $field){
        //     if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
        //             if(str_contains($field->Field, '_id')){
        //                 $data[]=[$field->Field=>$request[$field->Field]];
        //                 }
        //             }else{
        //                 $data[]=[$field->Field=>$request[$field->Field]];
        //             }
        // }
        $data=[["nama"=>$request["nama"],"kode_kbli"=>$request["kode_kbli"]]];
        DB::table('kblis')->insert(
            $data
        );
        return redirect()->route('kbli')->with('success', 'Data berhasil ditambah');
        // return view('show', compact('data'));
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
        $rute = 'kbli';
        $kolom = DB::select('desc kblis');
        $data = KBLI::where('id', $id)->get();
        return view('edit.kbli', compact('rute','kolom', 'data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kolom = DB::select('desc kblis');
        foreach($kolom as $field){
            if(str_contains($field->Field, 'id')||str_contains($field->Field, 'created')||str_contains($field->Field, 'updated')){
                if(str_contains($field->Field, '_id')){
                    DB::table('kblis')->where('id', $id)->update([
                        $field->Field => $request[$field->Field],
                    ]);
                }
            }else{
                DB::table('kblis')->where('id', $id)->update([
                    $field->Field => $request[$field->Field],
                ]);
            }
        }
        return redirect()->route('kbli')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KBLI::where('id', $id)->delete();
        return redirect()->route('kbli')->with('success', 'Data berhasil dihapus');
    }
}
