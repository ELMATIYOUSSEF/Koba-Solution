<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'consumed_at',
        'quantity',
        'price',
        'total_cost'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
