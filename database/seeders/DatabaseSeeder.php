<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CompanyProfile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user if not exists
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Create company profile if not exists
        CompanyProfile::firstOrCreate(
            ['company_name' => 'PT Setia Tritunggal Inti Artha'],
            [
                'company_description' => 'PT. Setia Tritunggal Inti Artha was founded in 2000. Our business is mainly in the trading of Pharmaceutical and Cosmetic chemicals and Raw material. We have now started to focus on developing the supply and distribution of Raw Material in line with company growth and customer need. Current business competition is very tight, but by having a team of reliable sourcing and marketing, we believe that our company will continue to grow with the trust of our customers and business partners. We always strive to maintain good relationships with customers by always providing the best service in quality, service, price, and safety, we work with the best business partners.',
                'vision' => 'To be a leading company in Indonesia which is engaged in trading and distribution of raw materials and chemicals with an orientation of the pharmaceutical and cosmetics that always provides high-quality products, excellent service, competitive prices, and strives to be the best partner to achieve customer satisfaction.',
                'mission' => 'To provide excellent service with a maximum added value to customers by continuous improvements in work systems and procedures, focusing on aspects of quality, service, safety, cost and delivery.',
                'address' => 'Taman Tekno Bangunan Multi Guna, Blok H2 No 5, Tangerang 15314',
                'phone' => '(+62-21) 756 3685 / 756 3663 / 756 3701',
                'email' => 'info@setia-tritunggal.com',
                'fax' => '(+62-21) 756 3713',
                'whatsapp' => '6281804040684',
                'hero_title' => 'Empowering Industries with Quality Raw Materials',
                'hero_subtitle' => 'Trusted since 2000 in pharmaceutical and cosmetic chemical supply across Indonesia.',
            ]
        );

        $this->call([
            FoodProductSeeder::class,
            ApiSeeder::class,
            CustomerSeeder::class,
        ]);
    }
}
