<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Basic Plan',
                'slug'        => Str::slug('Basic Plan'),
                'description' => 'This is the basic plan with standard features.',
                'price'       => 1000.00,
                'discount'    => 50.00,
            ],
            [
                'name'        => 'Premium Plan',
                'slug'        => Str::slug('Premium Plan'),
                'description' => 'Premium plan with advanced features.',
                'price'       => 2500.00,
                'discount'    => 100.00,
            ],
            [
                'name'        => 'Enterprise Plan',
                'slug'        => Str::slug('Enterprise Plan'),
                'description' => 'Enterprise-level service with full support.',
                'price'       => 5000.00,
                'discount'    => 250.00,
            ],
        ];

        DB::table('products')->insert($products);
    }
}
