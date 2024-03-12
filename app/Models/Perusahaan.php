<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaans';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function jenisperusahaan()
    {
        return $this->belongsTo(JenisPerusahaan::class, 'jenis_perusahaan_id');
    }
    public function proyek() {
        return $this->hasMany(Proyek::class, 'id');
    }
}
