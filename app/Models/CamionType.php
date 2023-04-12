<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CamionType extends Model
{
    use HasFactory;

    protected $fillable = [
        'Camion_type', 'Camion_capacity'
    ];

    public function camions()
    {
        return $this->hasMany(Camion::class);
    }
}
