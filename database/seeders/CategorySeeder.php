<?php

namespace Apydevs\Products\Database\Seeders;

use Apydevs\Products\Models\Category;
use Apydevs\Products\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Category::factory(10)->create();  // Creates 50 product entries
    }
}
