<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepoSorumlu extends Model
{

    protected $table = "depo_sorumlulari";
    protected $primaryKey = 'depo_sorumlu_id';
    public $timestamps = false;

    protected $casts = [ 'depo_id' => 'integer', 'sorumlu_id'  => 'integer'];

    protected $fillable = [
        'depo_id',
        'sorumlu_id'
    ];

    
    use HasFactory;
}
