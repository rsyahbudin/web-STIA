<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getPriceRupiahAttribute()
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }
}
