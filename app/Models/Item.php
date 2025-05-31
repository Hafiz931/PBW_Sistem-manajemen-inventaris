<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
    ];

    // Opsional: Casting tipe data jika diperlukan
    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
    ];
}
