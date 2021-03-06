<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Malzemeler extends Model
{
    protected $table = "malzemeler";
    protected $primaryKey = 'malzeme_id';
    public $timestamps = false;

    protected $casts = [ 'malzeme_id' => 'integer','malzeme_miktar' => 'integer', 'depo_id' => 'integer'];

    protected $fillable = [
        'malzeme_adi',
        'malzeme_birim',
        'malzeme_miktar',
        'depo_id'
    ];

    use HasFactory;
}
