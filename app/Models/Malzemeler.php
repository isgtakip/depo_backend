<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Malzemeler extends Model
{
    protected $table = "malzemeler";
    protected $primaryKey = 'malzeme_id';
    public $timestamps = false;

    
    protected $fillable = [
        'malzeme_adi',
        'malzeme_birim',
        'malzeme_miktar'
    ];

    use HasFactory;
}
