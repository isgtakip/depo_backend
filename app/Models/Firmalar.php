<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firmalar extends Model
{

    protected $table = "firmalar";
    protected $primaryKey = 'firma_id';
    protected $casts = [ 'firma_tur' => 'integer', 'firma_tip'  => 'integer'];
    
    public $timestamps = false;

    
    protected $fillable = [
        'firma_unvan',
        'firma_tur',
        'firma_tip'
    ];

    use HasFactory;
}
