<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = [
            [
                'name' => 'Paracetamol',
                'description' => 'Obat untuk meredakan nyeri dan menurunkan demam',
                'category' => 'Analgesik',
                'manufacturer' => 'PT Kimia Farma',
                'dosage' => '500 mg',
                'price' => 10000,
                'stock' => 100,
                'prescription_required' => false,
                'image_url' => 'https://example.com/paracetamol.jpg',
            ],
            [
                'name' => 'Amoxicillin',
                'description' => 'Antibiotik untuk mengobati berbagai infeksi bakteri',
                'category' => 'Antibiotik',
                'manufacturer' => 'PT Dexa Medica',
                'dosage' => '500 mg',
                'price' => 25000,
                'stock' => 75,
                'prescription_required' => true,
                'image_url' => 'https://example.com/amoxicillin.jpg',
            ],
            [
                'name' => 'Omeprazole',
                'description' => 'Obat untuk mengurangi produksi asam lambung',
                'category' => 'Antasida',
                'manufacturer' => 'PT Kalbe Farma',
                'dosage' => '20 mg',
                'price' => 35000,
                'stock' => 50,
                'prescription_required' => true,
                'image_url' => 'https://example.com/omeprazole.jpg',
            ],
            [
                'name' => 'Cetirizine',
                'description' => 'Antihistamin untuk mengatasi alergi',
                'category' => 'Antihistamin',
                'manufacturer' => 'PT Sanbe Farma',
                'dosage' => '10 mg',
                'price' => 15000,
                'stock' => 120,
                'prescription_required' => false,
                'image_url' => 'https://example.com/cetirizine.jpg',
            ],
            [
                'name' => 'Simvastatin',
                'description' => 'Obat untuk menurunkan kadar kolesterol dalam darah',
                'category' => 'Antihiperlipidemia',
                'manufacturer' => 'PT Phapros',
                'dosage' => '20 mg',
                'price' => 45000,
                'stock' => 60,
                'prescription_required' => true,
                'image_url' => 'https://example.com/simvastatin.jpg',
            ],
        ];

        foreach ($medicines as $medicine) {
            Medicine::create($medicine);
        }
    }
}