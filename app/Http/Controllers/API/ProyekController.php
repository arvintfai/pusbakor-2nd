<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProyekResource;
use App\Models\Perusahaan;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProyekResource::collection(Proyek::with('perusahaan')
            ->with('modal', 'resiko', 'skalausaha', 'kbli', 'kecamatan', 'desa')
            ->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'latitude' => isset($request->latitude) ? $request->latitude : null,
            'longitude' => isset($request->longitude) ? $request->longitude : null,
            'alamat' => $request->alamat,
            'investasi' => $request->investasi,
            'perusahaan_id' => $request->perusahaan_id,
            'resiko_id' => $request->resiko_id,
            'skala_usaha_id' => $request->skala_usaha_id,
            'desa_id' => $request->desa_id,
            'kecamatan_id' => $request->kecamatan_id,
            'kbli_id' => $request->kbli_id,
        ];
        return response()->json(['Data berhasil ditambahkan', new ProyekResource(DB::table('proyeks')->insert($data))]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyek $proyek)
    {
        $proyek->latitude = isset($request->latitude) ? $request->latitude : null;
        $proyek->longitude = isset($request->longitude) ? $request->longitude : null;
        $proyek->alamat = $request->alamat;
        $proyek->investasi = $request->investasi;
        $proyek->perusahaan_id = $request->perusahaan_id;
        $proyek->resiko_id = $request->resiko_id;
        $proyek->skala_usaha_id = $request->skala_usaha_id;
        $proyek->desa_id = $request->desa_id;
        $proyek->kecamatan_id = $request->kecamatan_id;
        $proyek->kbli_id = $request->kbli_id;
        $proyek->save();
        return response()->json(['Data berhasil di Update', new ProyekResource($proyek)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        return response()->json(['Data berhasil dihapus']);
    }

    public function dashboard()
    {
        $jumlahperusahaan = Perusahaan::count();
        $jumlahproyek = Proyek::count();
        $jumlahlokasiproyek = Proyek::count() - Proyek::where('latitude', '')->where('longitude', '')->count();
        $data = [["judul" => "Perusahaan", "warna" => "Color(0xFFA4CDFF)", "icon" => "assets/icons/factory.svg", "jumlahdata" => $jumlahperusahaan], ["judul" => "Proyek", "warna" => "Color(0xFF007EE5)", "icon" => "assets/icons/project.svg", "jumlahdata" => $jumlahproyek], ["judul" => "Proyek dengan lokasi", "warna" => "Color.fromARGB(255, 177, 0, 41)", "icon" => "assets/icons/location.svg", "jumlahdata" => $jumlahlokasiproyek], ["judul" => "On Constructions", "warna" => " ", "icon" => "assets/icons/build.svg", "jumlahdata" => "Coming Soon"]];
        return response()->json(["data" => $data]);
    }
}
