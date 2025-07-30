<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivePharmaceuticalIngredient extends Model
{
    use HasFactory;

    protected $table = 'active_pharmaceutical_ingredients';

    protected $fillable = [
        'name',
        'description',
        'manufacturer',
        'country',
        'packaging',
        'packing_size',
        'image_url',
    ];

}