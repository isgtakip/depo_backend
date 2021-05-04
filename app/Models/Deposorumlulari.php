<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposorumlulari extends Model
{
    protected $table = "depo_sorumlulari";
    protected $primaryKey = 'depo_sorumlu_id';
    public $timestamps = false;

    protected $fillable = [
        'depo_id',
        'sorumlu_id'
    ];
    use HasFactory;
}
