<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorumlular extends Model
{

    protected $table = "sorumlular";
    protected $primaryKey = 'sorumlu_id';
    public $timestamps = false;

    protected $fillable = [
        'sorumlu_ad_soyad',
    ];

    use HasFactory;
}
