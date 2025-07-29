<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Haircut',
                'description' => 'Professional haircut service for men',
                'duration' => 30,
                'price' => 75000,
            ],
            [
                'name' => 'Haircut & Beard Trim',
                'description' => 'Complete grooming service including haircut and beard trim',
                'duration' => 45,
                'price' => 100000,
            ],
            [
                'name' => 'Beard Trim',
                'description' => 'Professional beard trimming and shaping',
                'duration' => 20,
                'price' => 50000,
            ],
            [
                'name' => 'Hair Coloring',
                'description' => 'Professional hair coloring service',
                'duration' => 60,
                'price' => 65000,
            ],
            [
                'name' => 'Hair Styling',
                'description' => 'Professional hair styling service',
                'duration' => 30,
                'price' => 40000,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
