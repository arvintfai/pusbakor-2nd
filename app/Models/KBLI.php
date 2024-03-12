<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KBLI extends Model
{
    use HasFactory;

    protected $table = 'kblis';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function proyek() {
        return $this->hasMany(Proyek::class, 'id');
    }
}