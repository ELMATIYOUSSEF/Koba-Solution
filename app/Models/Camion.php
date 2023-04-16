<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    protected $fillable = [
        'idDriver',
        'Camion_location',
        'Camion_status',
        'Capacity_disponible',
        'camion_type_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'idDriver');
    }
    public function camionType()
    {
        return $this->belongsTo(CamionType::class);
    }
}
