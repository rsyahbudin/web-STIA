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
        'fax',
        'whatsapp',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'logo_url',
    ];

    /**
     * Get company profile data
     */
    public static function getCompanyData()
    {
        $profile = self::first();

        if (!$profile) {
            // Return default data if no profile exists
            return (object) [
                'company_name' => 'PT Food Solutions Indonesia',
                'company_description' => 'Perusahaan terkemuka dalam distribusi bahan makanan berkualitas tinggi untuk industri makanan dan minuman di Indonesia.',
                'vision' => 'Menjadi mitra terpercaya dalam penyediaan bahan makanan berkualitas tinggi untuk industri makanan dan minuman di Indonesia.',
                'mission' => 'Menyediakan bahan makanan berkualitas tinggi dengan layanan terbaik dan harga kompetitif untuk memenuhi kebutuhan industri makanan dan minuman.',
                'address' => 'Jl. Sudirman No. 123, Jakarta Pusat, DKI Jakarta 12345',
                'phone' => '+62 21 1234 5678',
                'email' => 'info@foodsolutions.co.id',
                'fax' => '+62 21 1234 5679',
                'whatsapp' => '6281804040684',
                'hero_title' => 'Solusi Bahan Makanan Berkualitas',
                'hero_subtitle' => 'Menyediakan bahan makanan berkualitas tinggi untuk industri makanan dan minuman di Indonesia',
                'hero_image' => null,
                'logo_url' => null,
            ];
        }

        return $profile;
    }
}
