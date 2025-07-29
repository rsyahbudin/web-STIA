<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'manufacturer',
        'dosage',
        'price',
        'stock',
        'prescription_required',
        'image_url',
    ];

    protected $casts = [
        'prescription_required' => 'boolean',
    ];

    public function getPriceRupiahAttribute()
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }
}