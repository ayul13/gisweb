<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_lokasi';
    public $fillabel = ['nama','lat','lang','marker','id_kategori'];
    public $timestamps = true;

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }
}
