<?php

namespace Apydevs\Products\Database\Seeders;

use Apydevs\Products\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Product::factory(50)->create();  // Creates 50 product entries
    }
}
