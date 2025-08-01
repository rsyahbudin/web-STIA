<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'name' => 'PT Indofood Sukses Makmur',
                'description' => 'Leading food and beverage company in Indonesia',
                'industry' => 'Food & Beverage',
                'website' => 'https://www.indofood.co.id',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Wings Food',
                'description' => 'Major food and household products manufacturer',
                'industry' => 'Food & Beverage',
                'website' => 'https://www.wingscorp.com',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Garuda Food',
                'description' => 'Leading snack and food manufacturer',
                'industry' => 'Food & Beverage',
                'website' => 'https://www.garudafood.com',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Mayora Indah',
                'description' => 'Major consumer goods company',
                'industry' => 'Food & Beverage',
                'website' => 'https://www.mayora.com',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Kalbe Farma',
                'description' => 'Leading pharmaceutical company',
                'industry' => 'Pharmaceutical',
                'website' => 'https://www.kalbe.co.id',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Kimia Farma',
                'description' => 'State-owned pharmaceutical company',
                'industry' => 'Pharmaceutical',
                'website' => 'https://www.kimiafarma.co.id',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Dexa Medica',
                'description' => 'Leading pharmaceutical manufacturer',
                'industry' => 'Pharmaceutical',
                'website' => 'https://www.dexa-medica.com',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Sido Muncul',
                'description' => 'Traditional medicine and herbal products manufacturer',
                'industry' => 'Pharmaceutical',
                'website' => 'https://www.sidomuncul.co.id',
                'is_featured' => true,
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
