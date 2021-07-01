<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokHareketleri extends Model
{
    protected $table = "stok_hareketleri";
    protected $primaryKey = 'hareket_id';
    public $timestamps = false;

    protected $casts = [ 'malzeme_id' => 'integer', 
    'hareket_tipi' => 'integer', 'depo_id' => 'integer', 'firma_depo_id' => 'integer', 
    'sorumlu_id' => 'integer', 'belge_tipi_id' => 'integer'];

    protected $fillable = [
            'malzeme_id',
            'miktar',
            'hareket_tipi',
            'hareket_tarihi',
            'depo_id',
            'firma_depo_id',
            'tedarik_turu',
            'belge_tipi_id',
            'belge_no',
            'sorumlu_id',

    ];


    use HasFactory;


}

