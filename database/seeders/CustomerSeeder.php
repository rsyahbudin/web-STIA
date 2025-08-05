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
                'name' => 'PT Waris',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Bintang Toedjoeh',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Hexpharm Jaya',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Wahana Interfood (Schoko)',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Kalbe Farma',
                'description' => 'Leading pharmaceutical company',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Kimia Farma',
                'description' => 'State-owned pharmaceutical company',
                'is_featured' => true,
            ],
            [
                'name' => 'PT Lotte Indonesia',
                'description' => 'Leading pharmaceutical manufacturer',
                'is_featured' => true,
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
