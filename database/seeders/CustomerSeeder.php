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
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '08123456789',
                'address' => 'Jl. Sudirman No. 123, Jakarta'
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '08987654321',
                'address' => 'Jl. Thamrin No. 456, Jakarta'
            ],
            [
                'name' => 'Ahmad Rahman',
                'email' => 'ahmad.rahman@example.com',
                'phone' => '08555666777',
                'address' => 'Jl. Gatot Subroto No. 789, Jakarta'
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@example.com',
                'phone' => '08777888999',
                'address' => 'Jl. Kuningan No. 101, Jakarta'
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'phone' => '08111222333',
                'address' => 'Jl. Senayan No. 202, Jakarta'
            ]
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
