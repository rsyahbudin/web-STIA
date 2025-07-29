<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'manufacturer',
        'country',
        'packaging',
        'packing_size',
        'price',
        'image_url',
    ];

    public function getPriceRupiahAttribute()
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }
}