<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depolar extends Model
{

    protected $table = "depolar";
    protected $primaryKey = 'depo_id';
    public $timestamps = false;

    protected $fillable = [
        'depo_adi',
    ];


    use HasFactory;
}
