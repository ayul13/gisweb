<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kategori';
    public $fillabel = ['nama_kategori','ket'];
    public $timestamps = true;

    public function lokasi(){
        return $this->hasMany(lokasi::class);
    }
}
