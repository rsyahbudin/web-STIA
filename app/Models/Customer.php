<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo_url',
        'website',
        'industry',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
