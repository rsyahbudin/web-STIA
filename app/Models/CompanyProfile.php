<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_description',
        'vision',
        'mission',
        'address',
        'phone',
        'email',
        'website',
        'hero_title',
        'hero_subtitle',
        'logo_url',
    ];

    public static function getCompanyData()
    {
        return self::first() ?? self::create([
            'company_name' => 'PT Gepi Pharma',
            'company_description' => 'Kami adalah perusahaan terdepan dalam penyediaan bahan makanan berkualitas tinggi dan Active Pharmaceutical Ingredients (API) untuk industri farmasi di Indonesia dan Asia Tenggara.',
            'vision' => 'Menjadi perusahaan terdepan dalam penyediaan bahan makanan dan API berkualitas tinggi di Asia Tenggara.',
            'mission' => 'Menyediakan produk berkualitas tinggi dengan standar internasional, memberikan layanan terbaik kepada pelanggan, dan berkontribusi pada kemajuan industri farmasi dan makanan.',
            'address' => 'Jl. Industri Raya No. 123, Jakarta Timur, Indonesia',
            'phone' => '+62 21 1234 5678',
            'email' => 'info@gepipharma.com',
            'website' => 'www.gepipharma.com',
            'hero_title' => 'PT Gepi Pharma',
            'hero_subtitle' => 'Penyedia terpercaya produk makanan berkualitas tinggi dan Active Pharmaceutical Ingredients (API) untuk industri farmasi',
        ]);
    }
}
