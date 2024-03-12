<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Perusahaan;
use App\Models\Proyek;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaan=Perusahaan::count();
        $proyek=Proyek::count();
        $proyeklokasi=Proyek::count()-Proyek::where('latitude','')->where('longitude','')->count();
        $kecamatan=Kecamatan::all();
        foreach($kecamatan as $camat){
            $data_proyek[]=Proyek::where('kecamatan_id', $camat['id'])->count();
            $data_kecamatan[]=$camat['kecamatan'];
        }
        return view('admin.admin', compact('perusahaan', 'proyek', 'proyeklokasi','data_kecamatan','data_proyek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
