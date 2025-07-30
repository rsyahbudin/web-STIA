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
        'hero_title',
        'hero_subtitle',
        'logo_url',
    ];

    public static function getCompanyData()
    {
        return self::first() ?? self::create([
            [
                'company_name' => 'PT. Setia Tritunggal Inti Artha',
                'company_description' => 'We are a trading company in Pharmaceutical and Cosmetic chemicals and raw materials. We focus on developing supply and distribution of raw materials in line with company growth and customer needs.',
                'vision' => 'Be a leading company in Indonesia which is engaged in trading and distribution of raw material and chemicals with orientation of the pharmaceutical and cosmetics that always provide high quality products, excellent service, competitive prices, strive to be the best partner to achieve customer satisfaction.',
                'mission' => 'To provide excellent service with a maximum added value to customers by continuous improvements in work systems and procedures, focusing on aspects of quality, service, safety, cost and delivery.',
                'address' => 'Taman Tekno Bangunan Multi Guna, Blok H2 No. 5, Tangerang 15314, Indonesia',
                'phone' => '+62 21 7563685 / 7563663 / 7563701',
                'email' => 'info@setiatritunggal.com', // Sesuaikan jika ada email resmi
                'fax' => '+62 21 7563713',
                'hero_title' => 'PT. Setia Tritunggal Inti Artha',
                'hero_subtitle' => 'Trusted supplier in pharmaceutical, cosmetic chemicals, and raw material distribution in Indonesia',
            ]

        ]);
    }
}
