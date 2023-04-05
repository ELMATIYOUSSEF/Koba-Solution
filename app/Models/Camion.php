<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    protected $fillable = [
        'idDriver',
        'Camion_type',
        'Camion_capacity',
        'Camion_location',
        'Camion_status'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'idDriver');
    }
}
