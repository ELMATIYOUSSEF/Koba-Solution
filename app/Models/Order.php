<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'idcamion',
        'DateTimeOrder',
        'quantityWater',
        'location',
        'StatusOrder'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
