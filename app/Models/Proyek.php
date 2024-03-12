<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyeks';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class);
    }

    public function resiko(){
        return $this->belongsTo(Resiko::class);
    }

    public function skalausaha() {
        return $this->belongsTo(SkalaUsaha::class, 'skala_usaha_id');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }

    public function desa(){
        return $this->belongsTo(Desa::class);
    }

    public function kbli(){
        return $this->belongsTo(kbli::class);
    }
    public function modal(){
        return $this->belongsTo(Modal::class);
    }
}
