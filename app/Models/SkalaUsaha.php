<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaUsaha extends Model
{
    use HasFactory;

    protected $table = 'skala_usahas';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function proyek() {
        return $this->hasMany(Proyek::class, 'id');
    }
}
